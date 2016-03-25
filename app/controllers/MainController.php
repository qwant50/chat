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
        return $this->view->render('main');  //page, layout
    }

    public function actionDashboard()
    {
        $this->model = new Model();
        return $this->view->render('admin-page-dashboard');  //page, layout
    }

    public function actionLogin()
    {
        $this->model = new Model();
        //$this->data = $this->model->run($this->params);
        return $this->view->render('login');  //page, layout
    }
}
