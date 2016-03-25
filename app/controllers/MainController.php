<?php

namespace malahov\controllers;

use malahov\core\Controller;
use malahov\core\Model;
use malahov\core\View;

class MainController extends Controller
{

    public function actionIndex()
    {
        if (!isset($_SESSION['login'])) {
            return $this->actionLogin();
        }
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
        if (isset($_SESSION['login'])){
            return $this->actionIndex();  //page, layout
        }
        $data = [];
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
            if (!is_string($_POST['login']) || !preg_match('/^(\d|\w|-|_){3,20}$/', $_POST['login'])) {
                $data['error'] = 'Login is incorrect';
            } elseif (!is_string($_POST['password']) || !preg_match('/^.{6,20}$/', $_POST['password'])) {
                $data['error'] = 'Password is incorrect';
            } elseif (!is_string($_POST['email']) || !preg_match('/^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$/', $_POST['email']) || !strlen($_POST['email']) <= 50) {
                $data['error'] = 'Email is incorrect';
            } else {
                $data['validation'] = 'true';
            }
        };
        if (isset($data['validation'])) {
            // проверка по базе данных
        }
        if (isset($data['validation']) && $data['validation'] == 'true') {
            // регемся в сессию и уходим на майн
            return $this->actionIndex();
        }
        else {
            return $this->view->render('login', $data);  //page, layout
        }
       // $this->model = new Model();
    }
}
