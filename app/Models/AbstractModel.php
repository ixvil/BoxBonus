<?php
/**
 * Created by PhpStorm.
 * User: ixvil
 * Date: 22.01.2017
 * Time: 1:09
 */

namespace app\Models;


use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    /** @var  int $id */
    public $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}