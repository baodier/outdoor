<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-13
 * Time: 下午1:02
 * To change this template use File | Settings | File Templates.
 */
include_once "./../application/models/User.php";

class loginController extends Zend_Controller_Action
{
    var $userModel;
    public function init()
    {
        //session_start();
        /* Initialize action controller here */
        $this->userModel = new User();
    }

    public function indexAction()
    {
        /*if(!isset($_SESSION['user'])) $this->_redirect("/");
        $this->view->username = $_SESSION['user']['username'];*/
        /* Initialize action controller here */

    }

    public function logoutAction()
    {
        if(isset($_SESSION['user'])){
            session_unset();
        }
        $this->_redirect("/");
        /* Initialize action controller here */

    }

    public function checkAction(){
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();

        $email = $this->getParam('email');
        $pwd = $this->getParam('pwd');

        if($this->userModel->checkUser($email,$pwd)){
            $userInfo = $this->userModel->getUserInfoByEmail($email);
            $_SESSION['user'] = $userInfo;

            //print_r( $_SESSION['user']);
            //return;
            if(isset( $_SESSION['user'])){
                echo json_encode(array('code'=>'success'));
            }
            else echo json_encode(array('code'=>'fail'));
        }else echo json_encode(array('code'=>'fail'));
    }
}