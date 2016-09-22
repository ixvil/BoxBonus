<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PartnerCategory
 *
 * @property integer $id
 * @property string $name
 * @property Partner[] $partners
 * @method static \Illuminate\Database\Query\Builder|\App\PartnerCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PartnerCategory whereName($value)
 * @mixin \Eloquent
 */
class PartnerCategory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partners()
    {
        return $this->hasMany('App\Partner', 'partner_categories_id');
    }
}
