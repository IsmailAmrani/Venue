<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Venue
 *
 * @author eaismail
 */
class Venue {
    
    private $nom;
    
    private $vailability;
    
    private $AjoutePar;
    
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
     * Set vailability
     */
    public function setVailability($vailability)
    {
        $this->vailability = $vailability;

        return $this;
    }

    /**
     * Get vailability
     */
    public function getVailability()
    {
        return $this->vailability;
    }
    
    /**
     * Set AjoutePar
     */
    public function setAjoutePar($user)
    {
        $this->AjoutePar = $user;

        return $this;
    }

    /**
     * Get AjoutePar
     */
    public function getAjoutePar()
    {
        return $this->AjoutePar;
    }
    
    /**
     * Get Id
     */
    public function getId()
    {
        return $this->id;
    }
    
}
