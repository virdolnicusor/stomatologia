<?php

// setează configurările aplicației web
include_once 'config.php';

// accesează controlerul aplicației
new AppController;

$someUser = new UsersModel();
