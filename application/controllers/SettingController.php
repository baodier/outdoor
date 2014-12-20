<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-14
 * Time: 下午4:59
 * To change this template use File | Settings | File Templates.
 */

class SettingController extends Zend_Controller_Action
{
    public function init()
    {
        //session_start();
        /* Initialize action controller here */

    }

    public function indexAction()
    {
        if(!isset($_SESSION['user'])) $this->_redirect("/");
        /* Initialize action controller here */
        $this->view->type = 'index';
    }

    public function avatarAction()
    {
        if(!isset($_SESSION['user'])) $this->_redirect("/");
        $this->view->type = 'avatar';
    }

}