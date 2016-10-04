<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $all_book = D("Book")->relation(True)->select();

        $_SESSION['Books'] = $all_book;
        $this->assign("books",$all_book);

        $this->display();
    }

    public function all_author(){
        $arr = D("Author")->select();
        $this->assign("authors",$arr);
        // dump($arr);
        $this->display();
    }

    public function show_book(){

        $this->assign("books",$_SESSION['Books']);

    	$book_id = $_GET['id'];
    	$book = D("Book")->relation(True)->find($book_id);
    	$this->assign($book);
    	$this->display();
    }

    public function edit_book(){

        $this->assign("books",$_SESSION['Books']);

        $book_id = $_GET['id'];
        $book = D("Book")->relation(True)->find($book_id);
        $this->assign($book);
        $this->display();
    }

    public function add(){
        $type = $_GET['type'];
        if (isset($type)) {
            if ($type == "book") $this->display("add_book");
            if ($type == "author") $this->display("add_author");
        }
        else{
            $this->display();
        }
    }

    public function search()
    {
    	$name = $_GET['name'];
        $model = D("Author");
        $arr = $model->search($name);
        if ($arr == False) {
            $this->ajaxReturn('0');
        }
        else if($_GET['type']=='show'){
            $_SESSION['Books'] = $arr['books'];
            $this->assign("books",$arr['books']);
            $this->assign("author",$name);
            $this->display('index');
        }
    }

}