<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Partner
 *
 * @property integer $id
 * @property integer $partner_categories_id
 * @property string $name
 * @property PartnerCategory $partnerCategory
 * @property CustomerArrival[] $customerArrivals
 * @property CustomerSpent[] $customerSpents
 * @property Gift[] $gifts
 * @property News[] $news
 * @property PartnerUser[] $partnerUsers
 * @property string logo
 * @property string location
 * @property string description
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Partner whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Partner wherePartnerCategoriesId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Partner whereName($value)
 * @mixin \Eloquent
 */
class Partner extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'partner_categories_id',
        'name',
        'description',
        'location',
        'logo'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partnerCategory()
    {
        return $this->belongsTo('App\Models\PartnerCategory', 'partner_categories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerArrivals()
    {
        return $this->hasMany('App\Models\CustomerArrival', 'partners_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customerSpents()
    {
        return $this->hasMany('App\Models\CustomerSpent', 'partners_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gifts()
    {
        return $this->hasMany('App\Models\Gift');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\Models\News', 'partners_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partnerUsers()
    {
        return $this->hasMany('App\Models\PartnerUser');
    }
}
