<?php

class ConsultatieController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();
        if(isset($_SESSION['user'])){
            $data['title'] = 'Consultatie';
            echo $this->render(APP_PATH.VIEWS.'consultatia.html', $data);
        }
        else{
    
            $data['title'] = 'Consultatie ';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'necesitalogare.html', array());
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }

    }
}