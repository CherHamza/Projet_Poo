<?php

namespace hamza\poo\Controller;

use hamza\poo\Kernel\Views;
use hamza\poo\Kernel\AbstractController;
use hamza\poo\Entity\Users;

class Login extends AbstractController {

    public function index() {

        
        
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

    public function create() {

        
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('formInscription.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            // 'titlePage' => 'Login',
            
        ]);

    }



   

    }
