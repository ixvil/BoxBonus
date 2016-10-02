<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PartnerCategory
 *
 * @property integer $id
 * @property string $name
 * @property Partner[] $partners
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PartnerCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PartnerCategory whereName($value)
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
        return $this->hasMany('App\Models\Partner', 'partner_categories_id');
    }
}
