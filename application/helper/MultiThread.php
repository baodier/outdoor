<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-6
 * Time: 下午12:36
 * To change this template use File | Settings | File Templates.
 */

class MultiThread {
    var $count;
    function thread($count=1) {

        $this->count=$count;
    }

    function _submit() {
        for($i=1;$i<=$this->count;$i++) $this->_thread();
        return true;
    }

    function _thread() {
        $fp=fsockopen($_SERVER['HTTP_HOST'],80);
        fputs($fp,"GET $_SERVER[PHP_SELF]?flag=1\r\n");
        fclose($fp);
    }

    function exec($func) {
        isset($_GET['flag'])?call_user_func($func):$this->_submit();
    }
}