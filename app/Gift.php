<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $partner_id
 * @property Partner $partner
 * @property CustomerSpent[] $customerSpents
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
        return $this->belongsTo('App\Partner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerSpents()
    {
        return $this->hasMany('App\CustomerSpent', 'gifts_id');
    }
}
