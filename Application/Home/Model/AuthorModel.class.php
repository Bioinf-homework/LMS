<?php
namespace Home\Model;
use Think\Model\RelationModel;
class AuthorModel extends RelationModel{
    protected $tableName = 'author'; 
    // 关联模型有毒。。
    // protected $_link = array(
    //     'book' => array(
    //         'mapping_type'  => self::HAS_MANY,
    //         'class_name'    => 'book',
    //         'parent_key'    => 'authorid',
    //         'foreign_key'   => 'AuthorId',
    //         'mapping_name'  => 'books',
    //     ),
    // );

    public function search($name='')
    {
        $arr = $this->where("name = '$name'")->find();
        if (!isset($arr)) {
            return False;
        }
        $authorid = $arr['authorid'];
        $books = D("book")->where("authorid = '$authorid' ")->select();
        $arr['books'] = $books;
        return $arr;
    }

    public function has_writer($name){
        $arr = $this->where("name = '$name'")->find();
        if (!isset($arr)) {
            return False;
        }
        else{
            return $arr['authorid'];
        }
    }
}
