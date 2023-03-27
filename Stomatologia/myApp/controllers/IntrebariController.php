<?php

class IntrebariController extends AppController
{
    public function __construct(){
        $this->init();
    }

    public function init(){
        session_start();
        if(isset($_SESSION['user'])){
            $data['title'] = 'Intrebari';
            echo $this->render(APP_PATH.VIEWS.'intrebari.html', $data);
        }
        else{
            $data['title'] = 'Intrebari';
            $data['mainContent'] = $this->render(APP_PATH.VIEWS.'necesitalogare.html', array());
            echo $this->render(APP_PATH.VIEWS.'layout.html', $data);
        }

    }
}