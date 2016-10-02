<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PartnerUser
 *
 * @property integer $id
 * @property integer $partner_id
 * @property integer $user_id
 * @property Partner $partner
 * @property User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PartnerUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PartnerUser wherePartnerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\PartnerUser whereId($value)
 * @mixin \Eloquent
 */
class PartnerUser extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['partner_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
