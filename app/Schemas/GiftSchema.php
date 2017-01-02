<?php
/**
 * Created by PhpStorm.
 * User: ixvil
 * Date: 02.01.2017
 * Time: 3:18
 */

namespace App\Schemas;


use App\Models\Gift;
use App\Models\Partner;
use Neomerx\JsonApi\Schema\SchemaProvider;

class GiftSchema extends SchemaProvider
{
    protected $resourceType = 'Gift';
    /**
     * Get resource identity.
     *
     * @param Gift $resource
     *
     * @return string
     */
    public function getId($resource)
    {
        return $resource->id;
    }

    /**
     * Get resource attributes.
     *
     * @param Gift $resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'description' => $resource->description,
            'logo' => $resource->logo,
            'price' => $resource->price,
            'partner' => Partner::find($resource->partner_id),
        ];
    }

}