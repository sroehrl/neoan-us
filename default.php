<?php
// default route (homepage)
define('default_ctrl','home');

// optional: custom 404
define('default_404','notFound');

if(isset($_SERVER['HTTP_ORIGIN'])){
    $allowed = ['http://localhost'];
    $port = $_SERVER['HTTP_ORIGIN'];
    if(in_array($port, $allowed)){
        header("Access-Control-Allow-Origin: ".$port);
    }
}