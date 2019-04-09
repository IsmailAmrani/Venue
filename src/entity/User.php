<?php

namespace src\entity;

/**
 * User
 */
class User
{
    private $nom;

    private $prenom;

    private $email;

    private $password;
    
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
     * Set prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get id
     */
    public function getId()
    {
        return $this->id;
    }
}

