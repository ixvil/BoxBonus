<?php
/**
 * Created by PhpStorm.
 * User: shipin_a
 * Date: 02.10.2016
 * Time: 2:43
 */

namespace App\Schemas;


use App\Models\User;
use Neomerx\JsonApi\Schema\SchemaProvider;

class UserSchema extends SchemaProvider
{
    protected $resourceType = 'people';

    /**
     * Get resource identity.
     *
     * @param User $user
     * @return string
     *
     */
    public function getId($user): string
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
    public function getAttributes($user)
    {
        return array('name' => $user->name);
    }
}