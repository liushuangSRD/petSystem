<?php
/**
 * Created by PhpStorm.
 * User: liushuang
 * Date: 2019/4/20
 * Time: 19:58
 */

namespace app\api\model;


use think\model\concern\SoftDelete;

class Farm extends BaseModel
{
    use SoftDelete;

    protected $deleteTime = 'delete_time';
    protected $autoWriteTimestamp = 'datetime';

}