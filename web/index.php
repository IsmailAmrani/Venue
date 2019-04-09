<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../src/autoloader.php';
src\autoloader::register();

session_start();

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    if(basename($_SERVER['REQUEST_URI']) == 'logout.php') {
        $Controller = new src\controller\UserController();
        $Controller->logout();
    }
    else if(basename($_SERVER['REQUEST_URI']) == 'venue.php') {
        $Controller = new src\controller\VenueController();
        $Controller->index();
    }
    else if(basename($_SERVER['REQUEST_URI']) == 'new_venue.php') {
        $Controller = new src\controller\VenueController();
        $Controller->newVenue();
    }
    else if(basename($_SERVER['REQUEST_URI']) == 'new_event.php') {
        $Controller = new src\controller\VenueController();
        $Controller->newEvent();
    }
    else if(basename($_SERVER['REQUEST_URI']) == 'delete.php') {
        $Controller = new src\controller\VenueController();
        $Controller->Delete();
    }
    else{
        $Controller = new src\controller\VenueController();
        $Controller->index();
    }
}
else{
    $Controller = new src\controller\UserController();
    $Controller->login();
}