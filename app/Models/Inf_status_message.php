<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inf_status_message
 *
 * @property int $id
 * @property string $title
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_status_message query()
 */
class Inf_status_message extends Model
{
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

}
