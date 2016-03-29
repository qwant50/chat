<?php

namespace malahov\controllers;

use malahov\core\Controller;
use malahov\core\Validator;
use malahov\models\Message;
use malahov\models\Signup;


class MainController extends Controller
{

    public function actionIndex()
    {
        return $this->view->render('main');  //page, data
    }

    /**
     * @return string
     */
    public function actionSignup()
    {
        $data = [];
        if (isset($_POST['_csrf']) && $_POST['_csrf'] == $this->getToken()) {
            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $repassword = filter_input(INPUT_POST, 'repassword', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            if (!preg_match('/^(\d|\w|-|_){3,20}$/', $login)) {
                $data['error'] = 'Login is incorrect';
            } elseif (!preg_match('/^.{6,20}$/', $password)) {
                $data['error'] = 'Password is incorrect';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !strlen($email) > 50) {
                $data['error'] = 'Email is incorrect';
            } elseif ($password != $repassword) {
                $data['error'] = 'Passwords are not eq';
            } else {
                $this->model = new Signup();
                if ($this->model->isUserExist($login, $password)) {
                    $data['error'] = 'User exist. Please change login';
                } elseif ($this->model->isEmailExist($email)) {
                    $data['error'] = 'User with same email is exist';
                } else {
                    $this->model->saveUser($login, $password, $email);
                    return $this->actionIndex();
                }
            }
        }
        $this->setToken($data);
        return $this->view->render('signup', $data);  //page, data
    }

    /**
     * @return string
     */
    public function actionLogin()
    {
        if (isset($_SESSION['login'])) {
            return $this->actionIndex();  //  if user already loggin on
        }
        $data = [];
        if (isset($_POST['_csrf']) && $_POST['_csrf'] == $this->getToken()) {
            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            if (!preg_match('/^(\d|\w|-|_){3,20}$/', $login)) {
                $data['error'] = 'Login is incorrect';
            } elseif (!preg_match('/^.{6,20}$/', $password)) {
                $data['error'] = 'Password is incorrect';
            } else {
                $this->model = new Signup();
                if ($this->model->isUserExist($login, $password)) {
                    $_SESSION['login'] = $login;
                    return $this->actionIndex();
                } else {
                    $data['error'] = 'User not found. Login or password is incorrect';
                }
            }

        }
        $this->setToken($data);
        return $this->view->render('login', $data);  //page, data
    }

    public function actionLogout()
    {
        unset($_SESSION);
        session_destroy();
        return $this->actionIndex();
    }

    /**
     * @return string
     */
    public function actionPosts()
    {
        $this->model = new Message();
        $data = $this->model->getMessages();
        return $this->view->renderPartial('messages', $data);

    }

    public function actionAddMessage()
    {
        if (isset($_POST['message']) && strlen($_POST['message']) <= 1000) {
            if (!$_SESSION['login']) {
                return 'Только зарегестрированные пользователи могут отправлять сообщения';
            } else {
                $this->model = new Message();
                $this->model->saveMessage($_SESSION['login'], htmlspecialchars($_POST['message']));
                return 'Сообщение успешно доставлено.';
            }

        } else {
            return 'Сообщение некорректно или имеет длину более 1000 символов!';
        }
    }
}
