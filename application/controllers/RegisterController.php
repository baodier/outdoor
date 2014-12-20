<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-4
 * Time: 下午4:50
 * To change this template use File | Settings | File Templates.
 */

include_once "./../application/models/RegisterActive.php";
include_once "./../application/models/User.php";
include_once "./../application/helper/Util.php";

class RegisterController extends Zend_Controller_Action
{
    var $userModel;
    var $activeModel;
    public function init()
    {
        /* Initialize action controller here */
        $this->userModel = new User();
        $this->activeModel = new RegisterActive();
    }

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();
        // action body

        $email = $this->getParam("email");
        $pwd = md5($this->getParam("pwd"));
        $name = $this->getParam("name");

        $data = array("email"=>$email,
                "password"=>$pwd,
                "username"=>$name);

        //$userModel = new User();

        if($this->userModel->isExist($email)) echo "exit";
        else if($this->userModel->add($data)){
            //registerActive表的相关条目更新 active设置为1
            $this->activeModel->updateActiveState($email);
            echo "success";
        }else echo "fail";
        return;
    }

    public function validateAction(){
        $code = $this->getParam("code");
        $email = $this->getParam("email");

        $this->view->email = $email;

        if($this->activeModel->isExist($email,$code, 1)){
            $this->view->olduser = true;
            return false;
        }
        else if(!$this->activeModel->isExist($email,$code))
            $this->view->validate = false;
        else
            $this->view->validate = true;
    }

    public function activeAction(){
        //发邮件，载入页面
        $email = $this->getParam("email");
        $reg = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.edu.cn$/i';

        if(preg_match($reg,$email)){
            $this->view->validate = true;
        }else{
            $this->view->validate = false;
            return false;
        }

        //判断是否是正式用户，是的话不发邮件，提示登录，否则添加条目，发邮件
        $activeModel = new RegisterActive();

        $active_code = md5($email);
        if($activeModel->isExist($email,$active_code, 1)){
            $this->view->olduser = true;
            return false;
        }
        else if(!$activeModel->isExist($email,$active_code)){
            $activeModel->add($email);
        }
        send_active_mail($email, $active_code);
        $this->view->email = $email;
    }
}