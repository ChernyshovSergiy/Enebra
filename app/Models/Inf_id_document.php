<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsToMany\Countries;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Inf_id_document
 *
 * @property int $id
 * @property mixed|null $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Country[] $Countries
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read int|null $countries_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_id_document query()
 */
class Inf_id_document extends Model
{
    use Countries, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'name'
    ];
    public $timestamps = false;

    public function addIdDocument($request) :void
    {
        $id_document = new static;
        $id_document->fill($request->all());
        $id_document->name = json_encode($id_document->createLangString($request, 'name'));
        $id_document->save();
    }

    public function editIdDocument($request, $id) :void
    {
        $id_document = self::find($id);
        $id_document->fill($request->all());
        $id_document->name = json_encode($id_document->createLangString($request, 'name'));
        $id_document->update($request->all());
    }

    public function removeIdDocument($id) :void
    {
        self::find($id)->delete();
    }
}
