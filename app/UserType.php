<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserType
 *
 * @property integer $id
 * @property User[] $users
 * @method static \Illuminate\Database\Query\Builder|\App\UserType whereId($value)
 * @mixin \Eloquent
 */
class UserType extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
