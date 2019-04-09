<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace src\manager;

/**
 * Description of UserManager
 *
 * @author eaismail
 */
class UserManager {
    
    private $_db = null;
    
    public function __construct() {
         $this->_db = Database::getInstance();
    }
    
    /**
     * add user
     * @param user
     */
    public function AddUser($user){
        
        $query = $this->_db->prepare('INSERT INTO User (id, nom, prenom, email, password) VALUES (NULL, :nom, :prenom, :email, :password)');
        $query->execute(array(
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword()
        ));
        
    }
    
    /**
     * add user
     * @param user
     */
    public function EmailExist($email){
        
        try {
            $query = $this->_db->prepare('SELECT * FROM User WHERE email = :email');
            $query->execute(array(':email' => $email));
            if($query->rowCount() > 0){
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $e) {
            return "une erreur s'est produite";
        }
        
    }
    
    /**
     * login user
     * @param email Password
     */
    public function login($email, $password){
        
        try {
            $query = $this->_db->prepare('SELECT * FROM User WHERE email = :email AND password = :password');
            $query->execute(array(':email' => $email,':password' => md5($password)));
            if($query->rowCount() > 0){
                $queryLogin = $this->_db->prepare('UPDATE user SET isConnected = 1 WHERE user.email = :email');
                $queryLogin->execute(array(
                    ':email' => $email
                ));
                return TRUE;
            }
            return FALSE;
        } catch (PDOException $e) {
            return "une erreur s'est produite";
        }
        
    }
    
    /**
     * logout user
     * @param email Password
     */
    public function logout($email){
        $query = $this->_db->prepare('UPDATE User SET isConnected = 0 WHERE user.email = :email');
        $query->execute(array(
            ':email' => $email
        ));
    }
    
    /**
     * get User
     * @param email
     */
    public function getUser($email){
        $query = $this->_db->prepare('SELECT * from User WHERE User.email = :email');
        $query->execute(array(
            ':email' => $email
        ));
        return $query->fetch();
    }
    
    /**
     * get User
     * @param id
     */
    public function getUserById($id){
        $query = $this->_db->prepare('SELECT * from User WHERE user.id = :id');
        $query->execute(array(
            ':id' => $id
        ));
        return $query->fetch();
    }
    
}
