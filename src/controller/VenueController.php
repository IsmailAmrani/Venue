<?php

namespace src\controller;

use \src\manager\UserManager;
use \src\manager\VenueManager;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VenueController
 *
 * @author eaismail
 */
class VenueController {
    
    /**
     * Index
     */
    public function index(){
        
        //get Current User
        $CurrentuserEmail = $_SESSION['user'];
        $userManager = new UserManager;
        $user = $userManager->getUser($CurrentuserEmail);
        
        //get All Venue
        $venueManager = new VenueManager();
        $Venues = $venueManager->getAllVenue();
        
        echo $this->render([
            'user' => $user,
            'venues' => $Venues
                ], '../app/views/venue.php');
    }
    
    /**
     * Ajouter un nouveau lieu
     */
    public function newVenue(){
        
        $venueManager = new VenueManager();
        $venueManager->AddVenue($_SESSION['user'], $_POST['nom']);
        
    }
    
    /**
     * Ajouter un nouveau evenement
     */
    public function newEvent(){
        
        $venueManager = new VenueManager();
        $venueManager->AddEvent($_POST['venue'], $_POST['nom']);
        
    }
    
    /**
     * Supprimer un lieu
     */
    public function Delete(){
        
        $venueManager = new VenueManager();
        $venueManager->deleteVenue($_POST['venue']);
        
    }
    
    /**
     * Render a page function
     * @param array $data
     * @param  string $url directory of view
     * @return type
     */
    public function render($data, $url) {
        extract($data);

        ob_start();
        include($url);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    
}
