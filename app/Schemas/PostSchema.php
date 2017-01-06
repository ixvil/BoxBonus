<?php
/**
 * Created by PhpStorm.
 * User: ixvil
 * Date: 05.01.2017
 * Time: 0:46
 */

namespace App\Schemas;

use App\Models\Partner;
use App\Models\Post;
use Neomerx\JsonApi\Schema\SchemaProvider;
use TCG\Voyager\Models\Category;

class PostSchema extends SchemaProvider
{
    protected $resourceType = 'Post';

    /**
     * Get resource identity.
     *
     * @param Post $resource
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
     * @param Post $resource
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->title,
            'description' => $resource->excerpt,
            'text' => $resource->body,
            'logo' => $resource->image,
            'partner' => Partner::find($resource->partner_id),
            'category' => Category::find($resource->category_id)
        ];
    }
}