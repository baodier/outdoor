<?php

class Activity extends Zend_Db_Table{

    protected $_name = 'activity';  //表名
    protected $_primary='id';		//主键名

    public function getActivity($num){
        $select = $this->select();
        $select->from('activity', '*');
        $select->order('time');
        $select->limit($num);

        $result = $this->fetchAll($select)->toArray();
        if($result) return $result;
        else return null;
    }

}