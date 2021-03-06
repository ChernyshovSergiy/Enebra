<?php

namespace App\Models;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\HasOne\Menus;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Models\Inf_introduction
 *
 * @property int $id
 * @property int $title_id
 * @property mixed|null $content
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Menu $menu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction whereTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_introduction query()
 */
class Inf_introduction extends Model
{
    use Menus, BuildJson;

    protected $fillable = [
        'title_id',
        'content'
    ];
    protected $text_blocks = [
        'sub_title',
        'text',
        'replica',
        'conclusion'
    ];
    public $timestamps = false;

    public function getTextColumnsForTranslate(): array
    {
        return (new static)->text_blocks;
    }

    public function addContent($request): void
    {
        $introduction = new static;
        $introduction->fill($request->all());
        $introduction->content = $introduction
            ->setJson($request, $introduction->text_blocks);
        $introduction->save();
    }

    public function editContent($request, $id): void
    {
        $introduction = self::find($id);
        $introduction->fill($request->all());
        $introduction->setContent($request, $id);
        $introduction->update($request->all());
    }

    public function setContent($request, $id): void
    {
        if ($id === null) {
            return;
        }
        $this->content = $this->setJson($request, $this->text_blocks);
        $this->save();
    }

    public function getTitleFromMenu(): string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->title_id !== null)
            ? json_decode($this->menu->title)->$locale
            : 'don`t have language';
    }

    public function removeContent($id): void
    {
        self::find($id)->delete();
    }
}
