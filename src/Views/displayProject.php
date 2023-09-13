<?php 

use hamza\poo\Entity\Status;
use hamza\poo\Entity\Priority;
use hamza\poo\Entity\Users;

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter une Tâche
        </button>
        <a href="/index.php?controller=project&method=deleteProject&id=<?php echo $project->getId() ?>" class='btn btn-danger ' 
        onclick='Supp(this.href); return(false);'
        >Supprimer le Projet</a>

            <h3><?php echo $project->getTitle() ?></h3>
            <p class="lead"><?php echo $project->getDescription(); ?></p>
        </div>
        <div class="col-md-6">
            <h3>Mes Tâches</h3>
           
            <?php foreach ($tasks as $task) :  ?>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalUpdateTask">
                    Mettre à jour la tâche
                </button>
                <a class="btn btn-primary" onclick='Supp(this.href); return(false);' href="index.php?controller=Project&method=deleteTask&id=<?php echo $task->getId() ?> ">Supprimer la tâche</a>

              
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">Projet: <?php echo $task->getId_project() ?></p>

                        <p class="card-title">Titre tâches: <?php echo $task->getTitle() ?></p>
                        <p class="card-text">Description: <?php echo $task->getDescription() ?></p>
                        <p class="card-text">Collaborateur:
                            <?php foreach (users::getNameUser($task->getId_user()) as $user) : ?>
                                <?php echo $user->getName() ?>
                            <?php endforeach; ?>
                        </p>
                        <p class="card-text">Statut:
                            <?php foreach (status::getNameStatus($task->getId_status()) as $statu) : ?>
                                <?php echo $statu->getName() ?>
                            <?php endforeach; ?>
                        </p>
                        <p class="card-text">Priorité:
                            <?php foreach (priority::getNamePriority($task->getId_priority()) as $priorit) : ?>
                                <?php echo $priorit->getName() ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</main>
    <!-- Modal ajout tâche -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Ajouter une tâche</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                    <form action="index.php?controller=Project&method=createTask" method="POST">

                        <input type="hidden" value=" <?php echo $project->getId() ?>" name="idProject">
                        <div class="form-group">
                            <label for="taskTitle">Titre de la tâche</label>
                            <input type="text" class="form-control" name="taskTitle" id="taskTitle" placeholder="Titre de la tâche">
                        </div>
                        <div class="form-group">
                            <label for="taskContent">Description</label>
                            <textarea class="form-control" name="taskContent" id="taskContent" rows="4" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="taskUser">User</label>
                            <select class="form-control" name="taskUser" id="taskUser">
                                <option>Sélectionner un User</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?php echo $user->getId() ?>"><?php echo $user->getName() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskPriority">Priorité</label>
                            <select class="form-control" name="priority" id="taskPriority">
                                <option>Sélectionner une Priorité</option>

                                <?php foreach ($priority as $priorit) : ?>
                                    <option value="<?php echo $priorit->getId() ?>"><?php echo $priorit->getName() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskStatus">Cycle de vie</label>
                            <select class="form-control" name="status" id="taskStatus">
                                <option>Sélectionner un Statut</option>

                                <?php foreach ($status as $stat) : ?>
                                    <option value="<?php echo $stat->getId() ?>"><?php echo $stat->getName() ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button  class="btn btn-primary" >Ajouter la tâche</button>
                           
                            <a href="index.php?controller=User&method=createUser" class="btn btn-dark " type="submit" id="inscriptionBtn">Inscription</a>

                             
                        <!-- Div pour afficher le formulaire d'inscription -->
                             <div id="inscriptionForm"></div>
                            <style>
                              #inscriptionForm {
                                 width: 80%; 
                                 margin: 0 auto; } </style>
                                                
                        <!-- JavaScript pour charger le formulaire d'inscription via AJAX -->
                         <script>
                                                    
                        document.getElementById('inscriptionBtn').addEventListener('click', function (e) {
                            
                                //e.preventDefault(); 
                            //  AJAX pour charger le formulaire d'inscription
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'index.php?controller=User&method=createUser', true);
                            xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {

                                document.getElementById('inscriptionForm').innerHTML = xhr.responseText;
                                console.log(xhr.responseText)
                            }
                        };
                        xhr.send();
                        

                    });   
                        
                        </script>


                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Modification tâche-->

<div class="modal fade" id="ModalUpdateTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form action="index.php?controller=Project&method=update&id=<?php echo $task->getId() ?>" method="POST">

         <input type="hidden" value=" <?php echo $project->getId() ?>" name="idProject">
                        <div class="form-group">
                            <label for="taskTitle">Titre de la tâche</label>
                            <input type="text" class="form-control" name="taskTitle" id="taskTitle" placeholder="Titre de la tâche">
                        </div>
                        <div class="form-group">
                            <label for="taskContent">Description</label>
                            <textarea class="form-control" name="taskContent" id="taskContent" rows="4" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="taskUser">User</label>
                            <select class="form-control" name="taskUser" id="taskUser">
                                <option>Sélectionner un User</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?php echo $user->getId() ?>"><?php echo $user->getName() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskPriority">Priorité</label>
                            <select class="form-control" name="priority" id="taskPriority">
                                <option>Sélectionner une Priorité</option>

                                <?php foreach ($priority as $priorit) : ?>
                                    <option value="<?php echo $priorit->getId() ?>"><?php echo $priorit->getName() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskStatus">Cycle de vie</label>
                            <select class="form-control" name="status" id="taskStatus">
                                <option>Sélectionner un Statut</option>

                                <?php foreach ($status as $stat) : ?>
                                    <option value="<?php echo $stat->getId() ?>"><?php echo $stat->getName() ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-primary" >Save Changes</button>
      </div>
    </div>
  </div>     
          </form>
</div>
