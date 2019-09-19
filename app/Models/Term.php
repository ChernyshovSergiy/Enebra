<?php

namespace App\Models;

use App\Traits\Methods\BuildJson;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Term
 *
 * @property int $id
 * @property mixed|null $content
 * @property int|null $views_count
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Term newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Term newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Term query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Term whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Term whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Term whereViewsCount($value)
 */
class Term extends Model
{
    use BuildJson;

    protected $fillable = [
        'content',
        'views_count'
    ];

    public $text_blocks = [
        'title',
        'left_textarea',
        'right_textarea',
        'down_textarea'
    ];

    public $timestamps = false;

    public function getTextColumnsForTranslate(): array
    {
        return (new static)->text_blocks;
    }

    public function addContent($request): void
    {
        $term = new static;
        $term->fill($request->all());
        $term->content = $term
            ->setJson($request, $term->text_blocks);
        $term->save();
    }

    public function editContent($request, $id): void
    {
        $term = self::find($id);
        $term->fill($request->all());
        $term->setContent($request, $id);
        $term->update();
    }

    public function setContent($request, $id): void
    {
        if ($id === null) {
            return;
        }
        $this->content = $this->setJson($request, $this->text_blocks);
        $this->save();
    }

    public function removeContent($id): void
    {
        self::find($id)->delete();
    }
}
