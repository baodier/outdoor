<?php

class ActivityArtProfile extends Zend_Db_Table{

    protected $_name = 'activity_art_profile';  //表名
    protected $_primary='id';		//主键名

    public function getActivityList($type, $sale_state){
        $select = $this->select();
        $select->where('art_type in (?)',$type);
        if($sale_state == 'wait')
            $select->where('art_sale_state in (?)',0);
        else if($sale_state == 'sale')
            $select->where('art_sale_state in (?)',1);
        else if($sale_state == 'end')
            $select->where('art_sale_state in (?)',-1);
        $result = $this->fetchAll($select)->toArray();
        if($result) return $result;
        else return null;
    }

}
