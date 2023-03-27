<?php

class LoginController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        $uName = $_POST['userName'];
        $uPass = $_POST['userPass'];
        $user = new UsersModel;

        if($user->isAuth($uName, $uPass)){
            session_start();
            $_SESSION['user'] = $uName;
            $data['title'] = 'Bun Venit';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'login.html', array());
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else {
            echo $this->render(APP_PATH.VIEWS.'logareesuata.html');
            header("Refresh: 2; url = ?page=stomatologie");
            exit;
        }    
    }
}