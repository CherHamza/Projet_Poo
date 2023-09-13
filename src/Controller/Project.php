<?php 
namespace hamza\poo\Controller;

use hamza\poo\Entity\Users;
use hamza\poo\Entity\Projects;
use hamza\poo\Kernel\Views;
use hamza\poo\Kernel\AbstractController;
use hamza\poo\Entity\Status;
use hamza\poo\Entity\Priority;
use hamza\poo\Entity\Tasks;

class Project extends AbstractController {
    public function index()
    {
        $getStatus = Status::getAll();
        $getPriority = Priority::getAll();


        $projects = Projects::getProjectUser($_SESSION['user_id']);
        $taskUser = Tasks::getUserTask($_SESSION['user_id']);

        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('userpage.php');
        $view->setFooter('footer.html');
        

        $view->render([
            'flash' => $this->getFlashMessage(),
            'projects'=>$projects,
            'status'=>$getStatus,
            'priority'=>$getPriority,
            'tasks'=>$taskUser,


            
        ]);


    }

    public function createnewproject(){
        // Démarre la session si elle n'est pas déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Vérifie si l'utilisateur est connecté en vérifiant si $_SESSION['user_id'] est défini
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id']; // Je récupére l'ID de l'utilisateur connecté
    
            if(isset($_POST['submit'])) {  
                if(isset($_POST['description']) && $_POST['description']!==''){
                    if(isset($_POST['title']) && $_POST['title']!==''){
                       
    
                        $result= false;
    
                        // j'appele la méthode `create` du modèle Projects pour insérer le projet dans la base de données
                        $result = Projects::create([
                            'title' => $_POST['title'],
                            'description' => $_POST['description'],
                            'id_user'=> $id, 
                        ]);

                        if ($result) {
                            $this->setFlashMessage("Votre projet a bien été créé", "success");
                        } else {
                            $this->setFlashMessage("Erreur lors de la création du projet", "error");
                        }
                    }
                }
            }
        } else {
            
            $this->setFlashMessage("Vous devez être connecté pour créer un projet", "error");
        }
    
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('formProject.php');
        $view->setFooter('footer.html');
    
        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page HomeController',
        ]);


} 


     public function displayProject(){
    

        $id = $_GET['id'];
        $project = Projects::getById($id);
        $selectstatus = Status::getAll();
        $selectpriority = Priority::getAll();
        $selectusers = Users::getAll();
        $tasks= Tasks::getProjectTask($project->getId());
        

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setMain('displayProject.php');
        $view->setFooter('footer.html');
    
        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page Project',
            'project'=> $project,
            'status'=>  $selectstatus ,
            'priority'=> $selectpriority,
            'users'=>  $selectusers,
            'tasks'=> $tasks,
            
        ]);


     }
    public function createTask() {
       
        if($_POST) {
            if(isset($_POST['taskTitle']) && $_POST['taskTitle']!==''){
                if(isset($_POST['idProject']) && $_POST['idProject']!==''){
                if(isset($_POST['taskContent']) && $_POST['taskContent']!==''){
                if(isset($_POST['taskUser']) && $_POST['taskUser']!==''){
                    if(isset($_POST['priority']) && $_POST['priority']!==''){
                        if(isset($_POST['status']) && $_POST['status']!==''){
        
                            $result=false;
                            $result = Tasks::create([
                                
                                'title' => $_POST['taskTitle'],
                                'description'=>$_POST['taskContent'],
                                'id_user'=>$_POST['taskUser'],
                                'id_status'=>$_POST['status'],
                                'id_priority'=>$_POST['priority'],
                                'id_project'=>$_POST['idProject'],
                                
                                
                                
                                
                            ]);

                            if ($result) {
                                $this->setFlashMessage("Votre tâche a bien été créé", "success");
                            } else {
                                $this->setFlashMessage("Erreur lors de la création de la tâche", "error");
                            }
                    }
                }
            }
        }
      }
    }
}
    
        header("Location: " . $_SERVER['HTTP_REFERER']);
}
public function update() {
    
        if (isset($_POST['taskTitle']) && $_POST['taskTitle'] !== '') {
            if (isset($_POST['idProject']) && $_POST['idProject'] !== '') {
                if (isset($_POST['taskContent']) && $_POST['taskContent'] !== '') {
                    if (isset($_POST['taskUser']) && $_POST['taskUser'] !== '') {
                        if (isset($_POST['priority']) && $_POST['priority'] !== '') {
                            if (isset($_POST['status']) && $_POST['status'] !== '') {



                                $id = $_GET['id'];
                                $title = $_POST['taskTitle'];
                                $description = $_POST['taskContent'];
                                $id_user = $_POST['taskUser'];
                                $id_status = $_POST['status'];
                                $id_priority = $_POST['priority'];
                                $id_project = $_POST['idProject'];

                                $result = Tasks::updateTask(
                                    $id,
                                    $title,
                                    $description,
                                    $id_user,
                                    $id_priority,
                                    $id_status,
                                    $id_project

                                
                                );

                                if ($result) {
                                    $this->setFlashMessage("Votre tâche a bien été mise à jour", "success");
                                } else {
                                    $this->setFlashMessage("Erreur lors de la mise à jour de la tâche", "error");
                                }
                            }
                        }
                    }
                }
            }
        }
    

    header("Location: " . $_SERVER['HTTP_REFERER']);
}
public function deleteTask() {
    if ($_GET['id'] && isset($_GET['id'])) {
        $id = $_GET['id'];
        
        
        $result = Tasks::delete($id);

        if ($result) {
            $this->setFlashMessage("Votre tâche a bien été supprimée", "success");
        } else {
            $this->setFlashMessage("Erreur lors de la suppression de la tâche", "error");
        }
    }

   
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

public function deleteProject(){
    if ($_GET['id'] && isset($_GET['id'])) {
        $id = $_GET['id'];
        
        
        $result = Projects::delete($id);

        if ($result) {
            $this->setFlashMessage("Votre projet a bien été supprimée", "success");
        } else {
            $this->setFlashMessage("Erreur lors de la suppression de la projet", "error");
        }
    }

   
    header('Location:'. 'index.php?controller=Project&method=index');
}
       

        
}


