<main class="container">
        <h1>Interface d'administration des utilisateurs</h1>

        <a href="index.php?controller=Project&method=createnewproject" class="btn btn-dark">Create New Project</a>

        <h3>Mes Projets</h3>

        <div class="row">
            <?php foreach ($projects as $project) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="index.php?controller=Project&method=displayProject&id=<?php echo $project->getId() ?>">
                                <h2 class="card-title h4"><?php echo $project->getTitle(); ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h3>Mes Tâches</h3>