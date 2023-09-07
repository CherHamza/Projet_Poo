<?php 
namespace hamza\poo\Controller;

use hamza\poo\Kernel\Views;
use hamza\poo\Kernel\AbstractController;



class User extends AbstractController {
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