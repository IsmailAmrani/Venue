<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author eaismail
 */
class Event {
    
    private $nom;
    
    private $venue;
    
    private $id;
    
    /**
     * Set nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     */
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Set venue
     */
    public function setVenue($Venue)
    {
        $this->venue = $Venue;

        return $this;
    }

    /**
     * Get venue
     */
    public function getVenue()
    {
        return $this->venue;
    }
    
    /**
     * Get Id
     */
    public function getId()
    {
        return $this->id;
    }
    
}
