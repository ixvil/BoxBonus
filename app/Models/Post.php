<?php
/**
 * Created by PhpStorm.
 * User: ixvil
 * Date: 06.01.2017
 * Time: 4:03
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 *
 * @property integer id
 *
 */
class Post extends Model
{
    const PUBLISHED = 'PUBLISHED';
    /**
     * @var array
     */
    protected $fillable = ['partner_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }
}