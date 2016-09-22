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

    public function jiaoyan($data)
    {
        # TODO: 输入的字段类型判断
        dump($data);
        if(empty($data['Publisher'])||empty($data['Price'])||empty($data['Title'])||empty($data['ISBN'])||empty($data['PublishDate'])){
            return False;
        }
        if(!is_numeric($data['Price'])) return False;

        return True;
    }
    public function addw($data)
    {
        $author = array(
            'Name' => $data['Name'],
            'Age' => $data['Age'],
            'Country' => $data['Country']
            );
        $aid = D("Author")->add($author);

        unset($data['Name']);
        unset($data['Age']);
        unset($data['Country']);
        $data['AuthorId'] = $aid;
        $this->add($data);
    }
    public function addbook($data)
    {
        if($this->jiaoyan($data)){
            $aid = D("Author")->has_writer($data['name']);
            if($aid != False){
                $data['AuthorId'] = $aid;
                unset($data['name']);
                $this->data($data)->add();
                return 1;
            }
            else{
                return 2;
            }
        }
        else{
            return 0;
        }
    }
}
