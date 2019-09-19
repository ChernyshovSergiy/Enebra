<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sex
 *
 * @property int $id
 * @property string $title
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Sex query()
 */
class Sex extends Model
{
    public $timestamps = false;
}
