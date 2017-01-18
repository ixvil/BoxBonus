<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $balance
 * @property integer $walletId
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property CustomerArrival[] $customerArrivals
 * @property CustomerSpent[] $customerScents
 * @mixin \Eloquent
 */
class Customer extends Model
{

    protected $fillable = ['user_id', 'balance', 'created_at', 'updated_at', 'walletId'];

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

    /**
     * @return int
     */
    public static function getUnusedWalletId(): int
    {
        $notYet = true;
        while ($notYet) {
            $wallet = rand(100000000, 999999999);
            $user = Customer::where('walletId', $wallet)
                ->first();
            if (!isset($user['id'])) {
                return $wallet;
            }
        }
    }
}
