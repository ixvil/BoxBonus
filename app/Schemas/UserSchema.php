<?php declare(strict_types = 1);

namespace App\Schemas;


use App\Models\Customer;
use App\Models\User;
use Neomerx\JsonApi\Schema\SchemaProvider;

class UserSchema extends SchemaProvider
{
    protected $resourceType = 'User';

    /**
     * Get resource identity.
     *
     * @param User $user
     * @return int
     *
     */
    public function getId ($user): int
    {
        return $user->id;
    }

    /**
     * Get resource attributes.
     *
     * @param User $user
     *
     * @return array
     */
    public function getAttributes ($user)
    {
        return array(
            'name' => $user->name,
            'phone' => $user->phone,
            'email' => $user->email,
            'customer' => Customer::where('user_id', $user->id)->first());

    }
}