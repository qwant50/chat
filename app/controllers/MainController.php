<?php

namespace malahov\controllers;

use malahov\core\Controller;
use malahov\models\Message;
use malahov\models\modelSignup;
use malahov\core\Model;
use malahov\core\View;

class MainController extends Controller
{

    public function actionIndex()
    {
        return $this->view->render('main');  //page, layout
    }


    public function actionSignup()
    {
        $data = [];
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email'])) {
            if (!is_string($_POST['login']) || !preg_match('/^(\d|\w|-|_){3,20}$/', $_POST['login'])) {
                $data['error'] = 'Login is incorrect';
            } elseif (!is_string($_POST['password']) || !preg_match('/^.{6,20}$/', $_POST['password'])) {
                $data['error'] = 'Password is incorrect';
            } elseif (!is_string($_POST['email']) || !preg_match('/^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$/',
                    $_POST['email']) || !strlen($_POST['email']) > 50
            ) {
                $data['error'] = 'Email is incorrect';
            } elseif (!is_string($_POST['repassword']) || $_POST['password'] != $_POST['repassword']) {
                $data['error'] = 'Passwords are not eq';
            } else {
                $this->model = new modelSignup();
                if ($this->model->isUserExist($_POST['login'], $_POST['password'])) {
                    $data['error'] = 'User exist. Please change login or password';
                } else {
                    $this->model->saveUser($_POST['login'], $_POST['password'], $_POST['email']);
                    return $this->actionIndex();
                }
            }
        }

        return $this->view->render('signup', $data);  //page, layout
    }

    public function actionLogin()
    {
        if (isset($_SESSION['login'])) {
            return $this->actionIndex();  //  if user already loggin on
        }
        $data = [];
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {
            if (!is_string($_POST['login']) || !preg_match('/^(\d|\w|-|_){3,20}$/', $_POST['login'])) {
                $data['error'] = 'Login is incorrect';
            } elseif (!is_string($_POST['password']) || !preg_match('/^.{6,20}$/', $_POST['password'])) {
                $data['error'] = 'Password is incorrect';
            } else {
                $this->model = new modelSignup();
                if ($this->model->isUserExist($_POST['login'], $_POST['password'])) {
                    $_SESSION['login'] = $_POST['login'];
                    return $this->actionIndex();
                }
            }
        };
        return $this->view->render('login', $data);  //page, layout

    }

    public function actionLogout()
    {
        session_destroy();
        return $this->actionIndex();
    }

    public function actionPosts()
    {
        $this->model = new Message();
        $data = $this->model->getMessages();
        return $this->view->renderPartial('messages', $data);
       // return $res;
        //return 'Now: ' . date('l jS \of F Y h:i:s A');
    }

    public function actionAddMessage()
    {
        if (isset($_POST['message']) && is_string($_POST['message']) && strlen($_POST['message']) <= 1000) {
            if ($_SESSION['login']) {
                $this->model = new Message();
                $this->model->saveMessage($_SESSION['login'], $_POST['message']);
                return 'Сообщение успешно доставлено.';
            }
            else {
                return 'Только зарегестрированные пользователи могут отправлять сообщения';
            }

        }
        else {
            return 'Сообщение некорректно или имеет длину более 1000 символов!';
        }
    }
}
