<?php
/**
 * Created by PhpStorm.
 * User: ixvil
 * Date: 12.12.2016
 * Time: 1:40
 */

namespace App\Schemas;


use App\Models\Partner;
use App\Models\PartnerCategory;
use Neomerx\JsonApi\Schema\SchemaProvider;

class PartnerSchema extends SchemaProvider
{
    protected $resourceType = 'Partner';

    /**
     * Get resource identity.
     *
     * @param Partner $resource
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
     * @param Partner $resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return array(
            'name' => $resource->name,
            'partnerCategory' => PartnerCategory::find($resource->partner_categories_id),
            'description' => $resource->description,
            'location' => $resource->location,
            'logo' => $resource->logo
        );

    }
}