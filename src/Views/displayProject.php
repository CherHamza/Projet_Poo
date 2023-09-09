<main class="container">
        <h1>Interface gestion projet</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter une tâche
        </button>

        <h3><?php echo $project->getTitle() ?></h3>
        <p class="lead"><?php echo $project->getDescription(); ?></p>

        <h3>Mes Tâches</h3>

        <?php foreach($tasks as $task) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text">Projet: <?php echo $task->getId_project() ?></p>
                    <p class="card-title">Titre tâches: <?php echo $task->getTitle() ?></p>
                    <p class="card-text">Description: <?php echo $task->getDescription() ?></p>
                    <p class="card-text">Collaborateur: <?php echo $task->getId_user() ?></p>
                    <p class="card-text">Statut: <?php echo $task->getId_status() ?></p>
                    <p class="card-text">Priorité: <?php echo $task->getId_priority() ?></p>
                </div>
            </div>
        <?php endforeach ?>
    

    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</main>


    <!-- Modal -->
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
                           
                            <!-- Lien hypertexte avec une classe de bouton Bootstrap -->
                            <a href="index.php?controller=User&method=createUser" class="btn btn-primary" id="inscriptionBtn">Inscription</a>

                             
                        <!-- Div pour afficher le formulaire d'inscription -->
                             <div id="inscriptionForm"></div>
                            <style>
                              #inscriptionForm {
                                 width: 80%; 
                                 margin: 0 auto; } </style>
                                                
                        <!-- JavaScript pour charger le formulaire d'inscription via AJAX -->
                         <script>
                                                    
                        document.getElementById('inscriptionBtn').addEventListener('click', function (e) {
                            
                                e.preventDefault(); // Empêche le comportement par défaut du lien
                            //  AJAX pour charger le formulaire d'inscription
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'index.php?controller=User&method=createUser', true);
                            xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                document.getElementById('inscriptionForm').innerHTML = xhr.responseText;
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