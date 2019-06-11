<?php

/**
 *  Another test project
 *  Author: Zane Stearman
 *  Date:   04/10/2019
 *  File:   index.php
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL); //sets level to everything

//Require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){
echo "<h2> My Pets</h2><br>
    <a href='order'>Order a pet</a>";

});

$f3->route('GET /order', function(){

//    $view = new Template();

});
//Run Fat-free
$f3->run(); // ->called the object operator