<?php

class BunVenitController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){

        session_start();
        if(isset($_SESSION['user'])){
            $data['title'] = 'Bun Venit';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'bunvenit.html', array());
            echo $this->render(APP_PATH.VIEWS.'layoutAuth.html', $data);
        }
        else{
            $data['title'] = 'Bun Venit';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'necesitalogare.html', array());
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }

    }
}