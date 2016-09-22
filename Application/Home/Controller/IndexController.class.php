<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $all_book = D("Book")->all();
        $this->assign("books",$all_book);
        $this->display();
    }
    public function test()
    {
        $model = D("Book");
        // $arr = $model->relation()->select();
        $model->all();
        // dump($arr);
        $this->show('<meta charset="utf-8">');
    }
    public function show_book(){
    	$book_id = $_GET['id'];
    	$book = D("Book")->relation(True)->find($book_id);
    	// $author = D("author")->find($book['authorid']);
    	// dump($author);

    	$this->assign($book);
    	// $this->assign($author);
    	$this->display();
    }
    public function search()
    {
    	$name = $_GET['name'];

    	$author = M("author")->where("name = '$name'")->find();
    	// dump($author);

    	$authorid = $author['authorid'];
    	// $arr  = array('authorid' => $author['authorid']);
    	$books = D("book")->where("authorid = '$authorid' ")->select();
    	// dump($books);
 	$this->assign("books",$books);
    	$this->display('index');
    }
    public function add_book()
    {
    	$this->display();
    }
    public function insert(){
    	// $_POST[]
    	// TODO: 输入的字段类型判断
    	// TODO: 判断作者是否存在，不存在跳转添加作者。顺带把book信息传过去
    }
    public function add_write(){
    	// TODO:添加作者信息
    }
}