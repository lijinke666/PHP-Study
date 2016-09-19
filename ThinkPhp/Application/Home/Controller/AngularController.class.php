<?php
/**
 * Created by PhpStorm.
 * User: lijinke
 * Date: 2016/6/29
 * Time: 15:07
 */

namespace Home\Controller;
use Think\Controller;


class AngularController extends Controller
{
    public function angular(){
        $this->assign("title","Angular-http服务");
        $this->display();
    }
    public function angularHttpList(){
       $data =  M('BBook')->select();
        echo json_encode($data);
    }
}