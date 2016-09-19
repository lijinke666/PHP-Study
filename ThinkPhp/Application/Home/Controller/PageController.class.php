<?php
/**
 * Created by PhpStorm.
 * User: lijinke
 * Date: 2016/6/7
 * Time: 10:16
 */

namespace Home\Controller;
use Think\Controller;


class PageController  extends Controller
{
    public function index(){
        $this->assign('title',"滚动加载测试");
        $PageData = M('BComment')->limit(0, 3)->select();
        $this->assign('PageData',$PageData);
        $this->display();
    }
    
    public  function loading(){
        $page = I('get.page/d');
        $sizes = I('get.sizes');
//        echo $page;
        $PageData = M('BComment')->limit($page+$sizes, 2)->select();
        echo json_encode($PageData);     //转换成json
    }
}