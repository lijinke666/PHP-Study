<?php
namespace Home\Controller;           //声明命名空间    表明当前是Home模块下面的控制器
use Think\Controller;
class IndexController extends Controller {
    public function test(){
        echo "test<br/>";
        echo U("index/test")."<br/>";
    }
    public function index(){
        $allSize = M('TUser')->count();             //总条数
        $size = 5;                                  //每页条数
        $allPage = ceil($allSize /$size);           //总页数
        $page = I('get.page/d',1);                                  //当前页数

        $next = $page + 1;
        $prev = $page - 1;
        if( $page==$allPage ){
            $next= $allPage;
        }
        if( $page == 1 ){
            $prev = 1;
        }
        $offset = $size * ( $page - 1 );
        $divNode = "
        <td colspan='2'>
            <a href='".U('Index/index',array('page'=>($prev)))."'>上一页</a>
        </td>
        <td colspan='2'>
           <a href='".U('Index/index',array('page'=>($next)))."'>下一页</a>
        </td>";
        $data = M('TUser')->limit($offset,$size)->select();
        $this->assign(array('data'=>$data,'title'=>'用户','divNode'=>$divNode,'page',$page));
        $this->display();

    }


    public function detail(){
        $id = I("get.id/d", 0);
        $detailData = M("TInformation")->where(array('i_u_id'=>$id))->field('i_u_id ,i_address, i_name, i_sex')->select();
        $this->assign('detailData',$detailData);
        $this-> assign('title', '信息详情');
        $this->display();
    }
    
    public function update(){
        $id = I("post.i_u_id/d");
        $address = I("post.i_address/s");
        $name = I("post.i_name/s");
        $update = M('TInformation')->where(array('i_u_id'=>$id))->save(array('i_address'=>$address,'i_name'=>$name));
        if(!$update){
           return $this->error('修改失败');
        }
        $this->success('修改成功');
        $this->assign("detailData",$update);

    }

}