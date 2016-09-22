<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PartnerCategory
 *
 * @property integer $id
 * @property Partner[] $partners
 * @method static \Illuminate\Database\Query\Builder|\App\PartnerCategory whereId($value)
 * @mixin \Eloquent
 */
class PartnerCategory extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partners()
    {
        return $this->hasMany('App\Partner', 'partner_categories_id');
    }
}
