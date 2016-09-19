<?php
/**
 * Created by PhpStorm.
 * User: lijinke
 * Date: 2016/5/24
 * Time: 9:54
 */

namespace Home\Controller;
use Think\Controller;

class BookController extends Controller
{
    public function home(){
        $session = session('user');
        if(!$session){
            return  $this->redirect(U('Book/login'));
        }
        $data = M('BBook')->select();
        $this->assign(array('title'=>'主页---图书列表','user'=>$session,'bookData'=>$data));
        $this->display();
    }
    public function login(){
        $this->assign('title','登录');
        $this->display();
    }
    public function checkLogin(){
        $user = I('post.user');
        $pwd  = I('post.pwd');
        $data = M('BUser')->where(array('u_user'=>$user,'u_pwd'=>$pwd))->select();
        if(!$data){
            return $this->error("登录失败");
        }
        session('user',$user);
        $this->redirect(U('Book/home'));
    }

    public function addBook(){
        $this->assign('title','添加书籍');
        $this->display();
    }

    public function add(){
        $bookname = I('post.bookname/s');
        $type = I('post.type/d');
        $brief = I('post.brief');
        $d= I('post.date');
        $date=intval(date('Ymd',strtotime($d)));
        $i_b_id=M('BBook')->order("b_id desc")->getField("b_id")+1;
        if($bookname && $type && $brief && $date ){
            $data  = M('b_book')->add(array('b_bookname'=>$bookname,'b_type'=>$type));
            $data2 = M('b_book_info')->add(array('i_b_id'=>$i_b_id,'i_c_id'=>$i_b_id,'i_brief'=>$brief,'i_registe_date'=>$date));
            if(!$data && !$data2){
                return $this->error('添加失败');
            }
            $this->success('添加成功');
        }
    }

    public function delete(){
        $id = I('get.id');
        $data = M('BBook')->where(array('b_id'=>$id))->delete();
        if(!$data){
            return $this->error('删除失败');
        }else{
            $this->success('删除成功！');
        }
    }

    public function bookInfo(){
        $id = I('get.id');
        $data = M('BBookInfo')->alias('b')->join('__B_BOOK__ bi ON bi.b_id=b.i_b_id')
                ->where(array('b.i_b_id'=>$id))
                ->field('bi.b_bookname, bi.b_type, b.i_brief,b.i_registe_date,i_b_id')
                ->select();
        $comment = M('BComment')->alias('c')
                ->join('__B_BOOK_INFO__ c1 on c.c_b_id = c1.i_c_id ')
                ->join('__B_USER__ c2 on c.c_u_id = c2.u_c_id')
                ->where(array('c.c_b_id'=>$id))->select();
        $this->assign(array('title'=>'书籍详情','infoData'=>$data,'commentData'=>$comment,'c_b_id'=>$id));
        $this->display();
    }

    public function talk(){
        $msg = I('post.talkMsg');   //评论信息
        $user = session('user');
        $c_u_id = M('BUser')->where(array('u_user'=>$user))->getField('u_c_id');          //获取当前的用户评论id
        $c_b_id=I('post.id');        //当前书本id
        $date = intval(date('Ymd'));      //评论时间

        if($msg && $c_u_id && $c_b_id && $date){
            $data = M('BComment')->add(array('c_msg'=>$msg,'c_date'=>$date, 'c_b_id'=>$c_b_id, 'c_u_id' =>$c_u_id));
            if(!$data){
                return $this->error('评论失败');
            }
            $this->success('评论成功');
        }else{
            $this->error('错误');
        }
    }
}