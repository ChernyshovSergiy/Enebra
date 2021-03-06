<?php

namespace App\Models;

use App\Traits\Methods\BuildJson;
use App\Traits\Methods\GetTitleFromMenu;
use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\HasMany\ConstSections;
use App\Traits\Relations\HasMany\DescBlocks;
use App\Traits\Relations\HasMany\Descriptions;
use App\Traits\Relations\HasMany\FaqQuestions;
use App\Traits\Relations\HasMany\Purposes;
use App\Traits\Relations\HasMany\Titles;
use App\Traits\Relations\HasMany\WhatToDoPoints;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Inf_page[] $title
 * @property int $is_active
 * @property string $url
 * @property int $parent
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Const_section[] $const_sections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Desc_block[] $desc_block
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Faq_question[] $faq_questions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purpose[] $purpose
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\WhatToDoPoint[] $what_to_do_points
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUrl($value)
 * @mixin \Eloquent
 * @property-read int|null $const_sections_count
 * @property-read int|null $desc_block_count
 * @property-read int|null $faq_questions_count
 * @property-read int|null $purpose_count
 * @property-read int|null $title_count
 * @property-read int|null $what_to_do_points_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 */
class Menu extends Model
{
    use BuildJson,
        PrepareLangStrForJsonMethods,
        Titles, GetTitleFromMenu,
        Purposes,
        DescBlocks,
        ConstSections,
        WhatToDoPoints,
        FaqQuestions;

    protected $fillable = [
        'id',
        'title',
        'url',
        'parent',
        'sort'
    ];

    public function getVideoMenuPoint($name)
    {
        return $this->getActiveVideoMenuPoint($name);
    }

    public function getPageMenuPoint($name)
    {
        return $this->getActivePageMenuPoint($name);
    }

    public static function getMenuPointName() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();

        foreach($titles as $key => $title){
            $page_names[$key] = json_decode($title)->$locale;
//            if (($key = array_search('home', $page_names)) !== false){
//                unset($page_names[$key]);
//            };

        }
        array_unshift($page_names, Lang::get('nav.root'));

        return $page_names;
    }

    public function getParent() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if ($this->parent === 0){
            return '';
        }
        $title = self::where('id', $this->parent)->first();
        if (!empty($title)) {
            return json_decode($title->title)->$locale;
        }
    }

    public function active()
    {
        $this->is_active = 1;
        $this->save();
    }

    public function notActive()
    {
        $this->is_active = 0;
        $this->save();
    }

    public function toggleActive($id)
    {
        $toggle = self::find($id);
        if ($toggle->is_active === 0)
        {
            return $toggle->active();
        }
        return $toggle->notActive();
    }

    public static function addMenuPoint($request) :void//add new page
    {
        $menu = new static;
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->save();
    }

    public static function editMenuPoint($request, $id) :void //add new page
    {
        $menu = self::find($id);
        $menu->fill($request->all());
        $menu->title = json_encode($menu->createLangString($request, 'title'));
        $menu->update($request->all());
    }

    public static function removeMenuPoint($id) :void
    {
        self::where('parent', $id)->update(array('parent' => 0));

        self::find($id)->delete();
    }
}
