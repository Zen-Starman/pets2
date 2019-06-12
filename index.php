<?php

/**
 *  Pair Programming 2: pets2
 *  Author: Zane Stearman
 *  Date:   06/11/2019
 *  File:   index.php
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL); //sets level to everything

//Require autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
session_start();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//define a default route
$f3->route('GET /', function(){
echo "<h2> My Pets</h2><br>
    <a href='order'>Order a pet</a>";
});

$f3->route('GET /@animal', function($f3, $params)
{
    $animal = $params['animal'];

    switch ($animal) {
        case 'dog':
            echo "<h3>Woof!</h3>";
            break;
        case 'cat':
            echo "<h3>Meow</h3>";
            break;
        case 'Chicken':
            echo "<h3>Cluck!</h3>";
            break;
        case 'Snake':
            echo "<h3>SSSssssS!</h3>";
            break;
        case 'Cow':
            echo "<h3>MooO</h3>";
            break;
        default:
            $f3->error(404);
        }
});

$f3->route('GET /order', function(){

    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('POST /order2', function(){

    $animal = $_POST['animal'];
    $_SESSION['animal'] = $animal;

    $view = new Template();
    echo $view->render('views/form2.html');
});

$f3->route('POST /results', function(){

    $color = $_POST['color'];
    $_SESSION['color'] = $color;

    $view = new Template();
    echo $view->render('views/results.html');
});

//Run Fat-free
$f3->run();