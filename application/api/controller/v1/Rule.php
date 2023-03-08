<?php
/**
 * Created by PhpStorm.
 * User: 沁塵
 * Date: 2019/4/20
 * Time: 19:57
 */

namespace app\api\controller\v1;

use app\api\model\Rule as BookModel;
use think\db\Query;
use think\facade\Hook;
use think\Request;
use think\response\Json;

class Rule
{
    /**
     * 查询指定bid的图书
     * @param $bid
     * @param('bid','图书ID','require|number')
     * @return mixed
     */
    public function getRule($bid)
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
    public function getRules()
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
        return writeJson(201, '', '新建规范成功');
    }

    public function update(Request $request)
    {
        $params = $request->put();
        $bookModel = new BookModel();
        $bookModel->save($params, ['id' => $params['id']]);
        return writeJson(201, '', '更新规范成功');
    }

    /**
     * @groupRequired
     * @permission('删除规范','规范管理')
     * @param $bid
     * @return Json
     */
    public function delete($bid)
    {
        BookModel::destroy($bid);
        Hook::listen('logger', '删除了id为' . $bid . '的规范');
        return writeJson(201, '', '删除规范成功');
    }
}