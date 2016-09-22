<?php
namespace Home\Model;
use Think\Model\RelationModel;
class BookModel extends RelationModel{
    protected $tableName = 'book'; 
    protected $_link = array(
	'author' => array(
	    'mapping_type'  => self::BELONGS_TO,
	    'foreign_key'   => 'authorid',
	    'mapping_name'  => 'author',
	),
    );

    public function all($value='')
    {
    	$arr = $this->relation(True)->select();
    	return $arr;
    }
}
