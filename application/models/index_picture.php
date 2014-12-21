<?php

class Index_picture extends Zend_Db_Table{

    protected $_name = 'index_picture';  //表名
    protected $_primary='id';		//主键名

    public function getPictures(){
        $select = $this->select();
        $select->from('index_picture', '*');

        $result = $this->fetchAll($select)->toArray();
        if($result) return $result;
        else return null;
    }

}