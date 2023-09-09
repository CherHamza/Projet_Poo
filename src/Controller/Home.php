<?php

namespace hamza\poo\Controller;

use hamza\poo\Kernel\Views;
use hamza\poo\Kernel\AbstractController;
use hamza\poo\Entity\Users;


class Home extends AbstractController{

    public function index()
    {

        //  $user= Users::getById(1);
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('index.php');
        $view->setFooter('footer.html');
        


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page HomeController',
            // 'id_user'=> $user,
        ]);
    }

}