<?php
/**
 * Created by JetBrains PhpStorm.
 * User: deadlinehlt
 * Date: 13-6-14
 * Time: 下午4:59
 * To change this template use File | Settings | File Templates.
 */
include_once "./../application/helper/Util.php";
include_once "./../application/models/Activity.php";

class ActivityController extends Zend_Controller_Action
{
    var $ActivityModel;
    public function init()
    {
        //session_start();
        /* Initialize action controller here */
        //$this->activityModle = new ActivityArtProfile();
        $this->ActivityModel = new Activity();
    }

    public function indexAction()
    {
        $allActivity = $this->ActivityModel->getActivity(2);
        $allNum = count($allActivity);

        $this->view->count = $allNum;
        $this->view->activity = $allActivity;

    }

    /*
    public function playAction(){
        if(!isset($_SESSION['user'])) $this->_redirect("/");
        $type = 'all';
        $page = 1;
        $per = 5;
        if(isset($_GET['type'])) $type = $_GET['type'];
        if(isset($_GET['page'])) $page = $_GET['page'];
        if(isset($_GET['per'])) $per = $_GET['per'];

        $allList = $this->activityModle->getActivityList(1, $type);
        $allNum = count($allList);

        $resultList = array();
        $startNum = ($page-1)*$per;

        for($i = $startNum,$j = 0; $i < $allNum && $j < $per; $i++,$j++){
            $resultList[] = $allList[$i];
        }


        $this->view->sepHtml = getSepHtml('/activity/play?type='.$type,$allNum,$page,$per);
        //print_r($this->view->sepHtml);
        $this->view->controller = 'activity';
        $this->view->action = 'play';
        $this->view->type = $type;
        $this->view->resultList = $resultList;
    }*/


}