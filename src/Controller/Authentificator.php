<?php

namespace hamza\poo\Controller;

use hamza\poo\Kernel\Views;
use hamza\poo\Kernel\AbstractController;
use hamza\poo\Entity\Users;

class Authentificator extends AbstractController {

    public function login() {
        if(isset($_POST['submit'])) {

            if(isset($_POST['email']) && $_POST['email']!==''){
                if(isset($_POST['password']) && $_POST['password']!==''){
                    var_dump($_POST['email']);
                    //on récupère l'email enregistré sur la db
                    $userVerification = Users::getByEmail($_POST['email']);
                   

                    if($userVerification){
                        if(password_verify($_POST['password'], $userVerification->getPassword())){
                        
                            
                            
                                // Utilisateur authentifié, ouverture de la session
                                session_start();
                                // Enregistrez les informations de l'utilisateur dans la session si nécessaire
                                $_SESSION['user_id'] = $userVerification->getId();
                                $_SESSION['user_email'] = $userVerification->getEmail();
                            var_dump($_SESSION);
                           
                                // Redirigez ou effectuez d'autres actions en fonction de votre application
                                
                                header('Location: index.php');
                                // exit;
                        } else {

                            $this->setFlashMessage('votre email ou votre mdp est inccorect', 'error');

                        }

                    }else{
                        $this->setFlashMessage('votre email ou votre mdp est inccorect', 'error');
                }
                    }
                   
            }
   

        }

        

        
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('login.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            // 'titlePage' => 'Login',
            
        ]);

    }

    
    public function logout(){

        if(isset($_SESSION['user_id'])&& isset($_SESSION['user_email'])){
            unset ($_SESSION["user_id"]);
            unset ($_SESSION["user_email"]);

         

             header('Location: index.php?controller=Authentificator&method=login');

            //  die();

            

        }

    }

   

    }
