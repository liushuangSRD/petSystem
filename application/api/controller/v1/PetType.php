<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/4/20
 * Time: 19:57
 */

namespace app\api\controller\v1;

use app\api\model\PetType as BookModel;
use think\facade\Hook;
use think\Request;
use think\response\Json;

class PetType
{
    /**
     * 查询指定bid的图书
     * @param $bid
     * @param('bid','图书ID','require|number')
     * @return mixed
     */
    public function getPetType($bid)
    {
        $result = BookModel::get($bid);
        return $result;
    }

    public function getCount():int
    {
        $result = BookModel::count();
        return $result;
    }

    /**
     * 查询所有图书
     * @return mixed
     */
    public function getPetTypes()
    {
        $result = BookModel::all();
        return $result;
    }

    /**
     * 搜索图书
     */
    public function search()
    {

    }

    /**
     * 新建图书
     * @param Request $request
     * @return Json
     */
    public function create(Request $request)
    {
        $params = $request->post();
        BookModel::create($params);
        return writeJson(201, '', '新建宠物类型成功');
    }

    public function update(Request $request)
    {
        $params = $request->put();
        $bookModel = new BookModel();
        $bookModel->save($params, ['id' => $params['id']]);
        return writeJson(201, '', '更新宠物类型成功');
    }

    /**
     * @groupRequired
     * @permission('删除宠物类型','宠物种类')
     * @param $bid
     * @return Json
     */
    public function delete($bid)
    {
        BookModel::destroy($bid);
        Hook::listen('logger', '删除了id为' . $bid . '的宠物类型');
        return writeJson(201, '', '删除宠物类型成功');
    }
}