<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @property integer $id
 * @property integer $partners_id
 * @property Partner $partner
 * @method static \Illuminate\Database\Query\Builder|\App\News whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\News wherePartnersId($value)
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
        return $this->belongsTo('App\Partner', 'partners_id');
    }
}
