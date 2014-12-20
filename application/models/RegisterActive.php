<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-5
 * Time: 下午2:26
 * To change this template use File | Settings | File Templates.
 */

class RegisterActive extends Zend_Db_Table{

    protected $_name = 'register_active';  //表名
    protected $_primary='id';		//主键名

    public function isExist($email, $code, $is_active = 0){
;       $select = $this->select();
        $select->where('email in (?)',$email);
        $select->where('active_code in (?)',$code);
        $select->where('is_active in (?)',$is_active);
        $result = $this->fetchAll($select)->toArray();

        if(count($result) >= 1) return true;
        else return false;
    }

    public function add($email)
    {
        $active_code = md5($email);

        $data = array("email"=>$email,
            "active_code"=>$active_code);
        $id = $this->insert($data);

        return $id;
    }

    public function updateActiveState($email){
        $db = $this->getAdapter();
        $where = $db->quoteInto('email = ?',$email);
        $set = array('is_active'=> 1);
        $aflectRows = $this->update($set,$where);

        if($aflectRows > 0) return true;
        else return false;
    }
}
