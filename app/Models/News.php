<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @property integer $id
 * @property integer $partners_id
 * @property Partner $partner
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\News wherePartnersId($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['partners_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'partners_id');
    }
}
