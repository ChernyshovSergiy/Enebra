<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inf_social_network_link
 *
 * @property-read \App\Models\Image $image
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_social_network_link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_social_network_link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_social_network_link query()
 */
class Inf_social_network_link extends Model
{
    public function image()
    {
        return $this->hasOne(Image::class,'id', 'img_id');
    }
}
