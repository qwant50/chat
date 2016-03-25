<?php

namespace malahov\controllers;

use malahov\core\Controller;
use malahov\core\Model;
use malahov\core\View;

class MainController extends Controller
{

    public function actionIndex()
    {
        $this->model = new Model();
        //$this->data = $this->model->run($this->params);
        echo $this->view->render('main', 'layouts' . DS . 'default');  //page, layout
    }

    public function actionDashboard()
    {
        $this->model = new Model();
        echo $this->view->render('admin-page-dashboard', 'layouts' . DS . 'default');  //page, layout
    }

    public function actionLogin()
    {
        $this->model = new Model();
        //$this->data = $this->model->run($this->params);
        echo $this->view->render('login', 'layouts' . DS . 'default');  //page, layout
    }
}
