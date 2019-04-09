<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace src\manager;
use src\manager\UserManager;
/**
 * Description of UserManager
 *
 * @author eaismail
 */
class VenueManager {
    
    private $_db = null;
    
    public function __construct() {
         $this->_db = Database::getInstance();
    }
    
    /**
     * add venue
     * @param venue
     */
    public function AddVenue($userEmail, $venueNom){
        
        $userManager = new UserManager();
        $user = $userManager->getUser($userEmail);
        
        $query = $this->_db->prepare('INSERT INTO Venue (id, Nom, AjoutePar) VALUES (NULL, :nom, :AjoutePar)');
        $query->execute(array(
            ':nom' => $venueNom,
            ':AjoutePar' => $user['id']
        ));
        
    }
    
    /**
     * add event
     * @param event
     */
    public function AddEvent($venue, $eventNom){
        
        $query = $this->_db->prepare('INSERT INTO Event (id, Nom, Venue_id) VALUES (NULL, :nom, :Venue_id)');
        $query->execute(array(
            ':nom' => $eventNom,
            ':Venue_id' => $venue
        ));
        
    }
    
    /*
     *  get All venue
     */
    public function getAllVenue(){
        
        $userManager = new UserManager();
        
        $listVenue = [];
        
        $query = $this->_db->prepare('SELECT * FROM `Venue`');
        $query->execute();
        $venues = $query->fetchAll();
        
        foreach ($venues as $venue){
            
            $user = $userManager->getUserById($venue['AjoutePar']);
            
            $queryEvent = $this->_db->prepare('SELECT * FROM `Event` WHERE Venue_id = :Venue_id');
                $queryEvent->execute(array(
                ':Venue_id' => $venue['id']
            ));
            
            $venueItem = [];
            $venueItem['id'] = $venue['id'];
            $venueItem['Nom'] = $venue['Nom'];
            $venueItem['AjoutePar'] = $user['nom']." ".$user['prenom'];
            $venueItem['events'] = $queryEvent->fetchAll();
            
            array_push($listVenue, $venueItem);
                
        }
        
        return $listVenue;
        
    }
    
    /**
     * delete venue
     * @param venue
     */
    public function deleteVenue($venue){
        
        $this->deleteEvents($venue);
        $queryDeleteVenue = $this->_db->prepare('DELETE FROM Venue WHERE id = :venue');
        $queryDeleteVenue->execute(array(
            ':venue' => $venue
        ));
        
    }
    
    /**
     * delete venue
     * @param venue
     */
    public function deleteEvents($venue){
        
        $queryDeleteEvents = $this->_db->prepare('DELETE FROM Event WHERE Venue_id = :venue');
        $queryDeleteEvents->execute(array(
            ':venue' => $venue
        ));
        
    }
    
}
