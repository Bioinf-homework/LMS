<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $all_book = D("Book")->relation(True)->select();
        $this->assign("books",$all_book);
        $this->display();
    }

    public function show_book(){
    	$book_id = $_GET['id'];
    	$book = D("Book")->relation(True)->find($book_id);
    	$this->assign($book);
    	$this->display();
    }
    public function search()
    {
    	$name = $_GET['name'];
              $model = D("Author");
              $arr = $model->search($name);
              if ($arr == False) {
                $this->assign("info","木有'".$name."'这个人");
              }
              else{
                $this->assign("books",$arr['books']);
              }
    	$this->display('index');
    }
    public function insert($type=1){
        $type = $_GET['type'];
        if ($type==1) {
            $post_data = $_POST;
            $re = D('Book')->addbook($post_data);
            if($re == 1)
            {
                $this->success('新增成功');
            }
            elseif ($re == 2) {
                $this->redirect('Index/add_writer', $post_data, 1, '<meta charset="utf-8">需要新增作者信息,页面跳转中...');
            }
            else{
                $this->error('输入信息错误');
            }
        }
        else{ // 添加作者
            $post_data = $_POST;
            D('Book')->addw($post_data);
            $this->success('新增成功' ,'Index/index');
        }

    }
    public function add_book()
    {
        $this->display();
    }
    public function add_writer(){
        $this->display();
    }
}