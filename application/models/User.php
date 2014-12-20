<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-5
 * Time: 下午2:26
 * To change this template use File | Settings | File Templates.
 */

class User extends Zend_Db_Table{

    protected $_name = 'webuser';  //表名
    protected $_primary='id';		//主键名

    public function checkUser($email,$pwd ){
        $pwd = md5($pwd);
        $select = $this->select();
        $select->where('username in (?)',$email);
        $select->where('password in (?)',$pwd);
        $result = $this->fetchAll($select)->toArray();

        if(count($result) >= 1) return true;
        else return false;
    }

    public function getUserInfoByEmail($email){
        $select = $this->select();
        $select->where('username in (?)',$email);
        $result = $this->fetchAll($select)->toArray();
        if($result) return $result[0];
        else return null;
    }

    public function isExist($email){
        $select = $this->select();
        $select->where('username in (?)',$email);
        $result = $this->fetchAll($select)->toArray();

        if(count($result) >= 1) return true;
        else return false;
    }

    public function add($data)
    {
        if($data){
            $userid = $this->insert($data);
            return $userid;
        }
        return false;
    }
}
