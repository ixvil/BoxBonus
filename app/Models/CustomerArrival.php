<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerArrival
 *
 * @property integer $id
 * @property integer $customers_id
 * @property integer $partners_id
 * @property integer $value
 * @property Customer $customer
 * @property Partner $partner
 * @property int $bonuses
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerArrival whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerArrival whereCustomersId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CustomerArrival wherePartnersId($value)
 * @mixin \Eloquent
 */
class CustomerArrival extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customers_id', 'partners_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customers_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner', 'partners_id');
    }

    /**
     * @param int $value
     * @return int
     */
    public function countBonuses(int $value): int
    {
        $bonuses = $value / 10;

        return (int)$bonuses;
    }
}
