<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $balance
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property CustomerArrival[] $customerArrivals
 * @property CustomerSpent[] $customerScents
 */
class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'balance', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerArrivals()
    {
        return $this->hasMany('App\Models\CustomerArrival', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerSpents()
    {
        return $this->hasMany('App\Models\CustomerSpent', 'customers_id');
    }
}
