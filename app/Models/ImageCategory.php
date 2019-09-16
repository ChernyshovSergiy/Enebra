<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    protected $fillable = [
        'title'
    ];

    public function updateImageCategory($request, $id):void
    {
        $image_category = self::find($id);
        $image_category->fill($request->all());
        $image_category->update($request->all());
    }

    public function removeImageCategory($id):void
    {
        self::find($id)->delete();
    }

    public function getCategoryNames() :array
    {
        return self::pluck('title', 'id')->all();
    }
}
