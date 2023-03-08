<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/4/20
 * Time: 19:57
 */

namespace app\api\controller\v1;

use app\api\model\Adoption as BookModel;
use think\db\Query;
use think\facade\Hook;
use think\Request;
use think\response\Json;

class Adoption
{
    /**
     * 查询指定bid的图书
     * @param $bid
     * @param('bid','图书ID','require|number')
     * @return mixed
     */
    public function getAdoption($bid)
    {
        $result = BookModel::get($bid);
        return $result;
    }

    /**
     * @return Query
     */
    public function getCount():int
    {
        $result = BookModel::count();
        return $result;
    }

    /**
     * 查询所有图书
     * @return mixed
     */
    public function getAdoptions()
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
        return writeJson(201, '', '新建寄养信息成功');
    }

    public function update(Request $request)
    {
        $params = $request->put();
        $bookModel = new BookModel();
        $bookModel->save($params, ['id' => $params['id']]);
        return writeJson(201, '', '更新寄养信息成功');
    }

    /**
     * @groupRequired
     * @permission('删除寄养','宠物寄养')
     * @param $bid
     * @return Json
     */
    public function delete($bid)
    {
        BookModel::destroy($bid);
        Hook::listen('logger', '删除了id为' . $bid . '的寄养信息');
        return writeJson(201, '', '删除寄养信息成功');
    }
}