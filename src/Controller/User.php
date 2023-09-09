<?php 
namespace hamza\poo\Controller;

use hamza\poo\Entity\Users;
use hamza\poo\Kernel\Views;
use hamza\poo\Kernel\AbstractController;


class User extends AbstractController {

    public function createUser() {

        if(isset($_POST['submit'])) {
            if(isset($_POST['name']) && $_POST['name']!==''){
                if(isset($_POST['email']) && $_POST['email']!==''){
                    if(isset($_POST['password']) && $_POST['password']!==''){
                    

                

        $pwd = password_hash($_POST['password'], PASSWORD_BCRYPT);

            
         $result= false;
            // Appelez la méthode `create` du modèle User pour insérer l'utilisateur dans la base de données
            $result = Users::create([
                'name' => $_POST['name'],
                'password' => $pwd,
                'email' => $_POST['email'],
            ]);
            
    
            if ($result) {
                // L'inscription a réussi, vous pouvez rediriger vers la page de connexion ou effectuer d'autres actions
               $this->setFlashMessage("Votre compte a bien été créé", "success")   ;             
            }
    
            
                    }
                }
            }
            
    
            
        }

           
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
