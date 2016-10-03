<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller {
	public function Index(){
		$this->show("hello,FormController");
	}
	public function add_book(){
		$data = $_GET;
		$re = D('Book')->addbook($data);
		if ($re==1) {
			$this->ajaxReturn("添加成功");
		}
		else{
			$this->ajaxReturn("error");
		}
	}

	public function add_author(){
		$data = $_GET;
		$re = D('Author')->add($data);
	}

	public function del_book(){
	    $bid = $_GET['id'];
	    // $re = D("Book")->delete($bid);
	    $re = 1;
	    if($re == 1){
	        $this->ajaxReturn("删除成功");
	    }
	    $this->ajaxReturn($re);
	}
	public function edit_book(){
		$data['ISBN'] = $_GET['id'];
		$arr = $_GET;
		unset($arr['id']);
		$re = D("Book")->where($bid)->save($arr);
		if ($re==1) {
			$this->ajaxReturn("修改成功");
		}
		else{
			$this->ajaxReturn("error");
		}
	}

	public function ha()
	{
		$re = D("Author")->has_writer($name);
		$name = $_GET['name'];
		$model = D("Author");
		$arr = $model->search($name);
		if ($arr == False) {
		    	$this->ajaxReturn('0');
		}
		else{
			$this->ajaxReturn('1');
		}
	}
}