<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customers_id
 * @property integer $gifts_id
 * @property integer $partners_id
 * @property Customer $customer
 * @property Gift $gift
 * @property Partner $partner
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
        return $this->belongsTo('App\Customer', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gift()
    {
        return $this->belongsTo('App\Gift', 'gifts_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Partner', 'partners_id');
    }
}
