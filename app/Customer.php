<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property integer $id
 * @property CustomerArrival[] $customerArrivals
 * @property CustomerSpent[] $customerSpents
 * @property User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\Customer whereId($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerArrivals()
    {
        return $this->hasMany('App\CustomerArrival', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerSpents()
    {
        return $this->hasMany('App\CustomerSpent', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
