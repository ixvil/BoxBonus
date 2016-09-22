<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $partners_id
 * @property Partner $partner
 */
class New extends Model
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
