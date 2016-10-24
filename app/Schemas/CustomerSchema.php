<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 02.10.2016
 * Time: 18:42
 */

namespace App\Schemas;


use App\Models\Customer;
use Neomerx\JsonApi\Schema\SchemaProvider;

class CustomerSchema extends SchemaProvider
{
    protected $resourceType = 'Customer';

    /**
     * Get resource identity.
     *
     * @param Customer $customer
     * @return int
     *
     */
    public function getId ($customer): int
    {
        return $customer->id;
    }

    /**
     * Get resource attributes.
     *
     * @param Customer $customer
     * @return array
     */
    public function getAttributes ($customer): array
    {

        return array(
            'balance' => $customer->balance,
            'user' => $customer->user,
            'walletId' => $customer->walletId
        );
    }
}