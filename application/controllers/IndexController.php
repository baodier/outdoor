<?php

include_once "./../application/models/Activity.php";
include_once "./../application/models/index_picture.php";

class IndexController extends Zend_Controller_Action
{

    var $ActivityModel;
    var $PicutreModel;
    public function init()
    {
        //session_start();
        /* Initialize action controller here */
        //$this->activityModle = new ActivityArtProfile();
        $this->ActivityModel = new Activity();
        $this->PicutreModel = new Index_picture();
    }

    public function indexAction()
    {
        //轮换图片
        $turnPic = $this->PicutreModel->getPictures();
        $this->view->turnPic = $turnPic;

        //最新活动
        $allActivity = $this->ActivityModel->getActivity(2);
        $allNum = count($allActivity);

        $this->view->count = $allNum;
        $this->view->activity = $allActivity;



    }

}

