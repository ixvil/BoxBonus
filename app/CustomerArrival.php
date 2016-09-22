<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerArrival
 *
 * @property integer $id
 * @property integer $customers_id
 * @property integer $partners_id
 * @property Customer $customer
 * @property Partner $partner
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerArrival whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerArrival whereCustomersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CustomerArrival wherePartnersId($value)
 * @mixin \Eloquent
 */
class CustomerArrival extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customers_id', 'partners_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Partner', 'partners_id');
    }
}
