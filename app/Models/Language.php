<?php

namespace App\Models;

use App\Traits\Relations\HasMany\FlagImages;
use App\Traits\Relations\HasMany\UserLanguages;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $localization
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $flag_image_id
 * @property int $is_active
 * @property-read \App\Models\Image $flag_image
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereFlagImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereLocalization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $flag_country
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Language whereFlagCountry($value)
 */
class Language extends Model
{
    use FlagImages, UserLanguages;

    protected $fillable = [
        'slug',
        'title',
        'localization',
        'flag_country'
    ];

    public $timestamps = false;

    public function addNewLanguage($request): void
    {
        $language = new static;
        $language->fill($request->all());
        $language->save();
    }

    public function editLanguage($request, $id): void
    {
        $language = self::find($id);
        $language->fill($request->all());
        $language->update($request->all());
    }

    public function removeLanguage($id): void
    {
        self::find($id)->delete();
    }

    public function getFlagImage(): string
    {
        if ($this->flag_country === null){
            return '/img/no-image.png';
        }
        return '/uploads/flags_svg/'. $this->flag_country.'.svg';
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
