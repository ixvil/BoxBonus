<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerSpent
 *
 * @property integer $id
 * @property integer $customers_id
 * @property integer $gifts_id
 * @property integer $partners_id
 * @property Customer $customer
 * @property Gift $gift
 * @property Partner $partner
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerSpent whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerSpent whereCustomersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerSpent wherePartnersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerSpent whereGiftsId($value)
 * @mixin \Eloquent
 */
class CustomerSpent extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customers_id', 'gifts_id', 'partners_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gift()
    {
        return $this->belongsTo('App\Models\Gift', 'gifts_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'partners_id');
    }
}
