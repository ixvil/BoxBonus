<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $partner_categories_id
 * @property string $name
 * @property PartnerCategory $partnerCategory
 * @property CustomerArrival[] $customerArrivals
 * @property CustomerSpent[] $customerSpents
 * @property Gift[] $gifts
 * @property News[] $news
 * @property User[] $users
 */
class Partner extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['partner_categories_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partnerCategory()
    {
        return $this->belongsTo('App\PartnerCategory', 'partner_categories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerArrivals()
    {
        return $this->hasMany('App\CustomerArrival', 'partners_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerSpents()
    {
        return $this->hasMany('App\CustomerSpent', 'partners_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts()
    {
        return $this->hasMany('App\Gift');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\News', 'partners_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'partner_users');
    }
}
