<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Gift
 *
 * @property integer $id
 * @property integer $partner_id
 * @property Partner $partner
 * @property CustomerSpent[] $customerSpents
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gift whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gift wherePartnerId($value)
 * @mixin \Eloquent
 */
class Gift extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['partner_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerSpents()
    {
        return $this->hasMany('App\Models\CustomerSpent', 'gifts_id');
    }
}
