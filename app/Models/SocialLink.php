<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsTo\Images;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialLink
 *
 * @property int $id
 * @property string $name
 * @property int $is_active
 * @property mixed|null $url
 * @property int $sort
 * @property int|null $image_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Image|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink whereUrl($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SocialLink query()
 */
class SocialLink extends Model
{
    use Images, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'name',
        'url',
        'sort',
        'image_id'
    ];
    public $timestamps = false;

    public static function addSocialLink($fields) :void
    {
        $social_link = new static;
        $social_link->fill($fields->all());
        $social_link->setImage($fields->get('image_id'));
        $social_link->url = json_encode($social_link->createLangString($fields, 'url'));
        $social_link->save();
    }

    public function editLink($fields, $id) :void
    {
        $social_link = self::find($id);
        $social_link->fill($fields->all());
        $social_link->setImage($fields->get('image_id'));
        $social_link->url = json_encode($social_link->createLangString($fields, 'url'));
        $social_link->update($fields->all());
    }

    public function removeSocialLink($id) :void
    {
        self::find($id)->delete();
    }

    public function getImage(): string
    {
        if ($this->image->id === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->image->image_category->title
            .'/'. $this->image->image;
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

}
