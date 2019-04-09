<?php

namespace src\controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author eaismail
 */
class UserController {
    
    

    /**
     * Login Page
     */
    public function login(){
        
        $userManager = new \src\manager\UserManager();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($_POST["mode"]){
                
                case 'login':
                    
                    //Si les information de connexion sont incorrect
                    if(!$userManager->login($_POST["email"], $_POST["password"])){
                        echo $this->render(array(
                            'Message' => 'Email ou Mot de passe Incorrect!'
                                ), '../app/views/login.php');
                        break;
                    }
                    
                    //S'ils sont correct
                    $_SESSION['user'] = $_POST["email"];
                    header('Location: venue.php');
                    
                    break;
                    
                case 'register':
                    
                    //On verifie si l'email existe deja
                    if($userManager->EmailExist($_POST["email"])){
                        echo $this->render(array(
                            'Message' => 'Cet email existe déja!'
                                ), '../app/views/login.php');
                        break;
                    }
                    
                    $user = new \src\entity\User();
                    $user->setNom($_POST["nom"])
                            ->setPrenom($_POST["prenom"])
                            ->setEmail($_POST["email"])
                            ->setPassword(md5($_POST["password"]));
                    
                    
                    $userManager->AddUser($user);
                    
                    $_SESSION['user'] = $_POST["email"];
                    header('Location: venue.php');
                    
                    break;
            }
        }
        else{
            echo $this->render(array(
            'Message' => ''
                ), '../app/views/login.php');
        }
        
    }
    
    /**
     * User Logout
     */
    public function logout(){
        
        $userManager = new \src\manager\UserManager();
        $userManager->logout($_SESSION['user']);
        
        session_destroy();
        header('Location: login.php');
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
