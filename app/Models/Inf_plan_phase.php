<?php

namespace App\Models;

use App\Traits\Methods\PrepareLangStrForJsonMethods;
use App\Traits\Relations\BelongsToMany\Countries;
use App\Traits\Relations\HasMany\PlanPhases;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Models\Inf_plan_phase
 *
 * @property int $id
 * @property mixed|null $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Country[] $Countries
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inf_plan_section_point[] $plan_points
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read int|null $countries_count
 * @property-read int|null $plan_points_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Inf_plan_phase query()
 */
class Inf_plan_phase extends Model
{
    use PlanPhases, Countries, PrepareLangStrForJsonMethods;

    protected $fillable = [
        'title'
    ];
    public $timestamps = false;

    public function createPlanPhase($request) :void
    {
        $planPhase = new static;
        $planPhase->fill($request->all());
        $items = $this->createLangString($request, 'title');
        $planPhase->title = json_encode($items);
        $planPhase->save();
    }

    public function editPlanPhase($request, $id) :void
    {
        $phase = self::find($id);
        $phase->title = json_encode($phase->createLangString($request, 'title'));
        $phase->update($request->all());
    }

    public function getPhaseNames() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = self::pluck( 'title', 'id')->all();
        $phase_names = [];
        foreach($titles as $key => $title){
            $phase_names[$key] = json_decode($title)->$locale;
        }
        return $phase_names;
    }

    public function removePlanPhase($id):void
    {
        self::find($id)->delete();
    }

}
