<?php

class SignupController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        $uName = $_POST['signUpName'];
        $uPass = $_POST['signUpPass1'];
        $user = new UsersModel;
        
        if($user->addUser($uName, $uPass)){
            session_start();
            $_SESSION['user'] = $uName;
            $data['title'] = 'SIGN UP';
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