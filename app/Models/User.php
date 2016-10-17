<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $user_type_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereUserTypeId($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereName($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType ()
    {
        return $this->belongsTo('App\Models\UserType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partnerUsers ()
    {
        return $this->hasMany('App\Models\PartnerUser');
    }
}

