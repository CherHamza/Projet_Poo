<main class="container">
<h1><?= $titlePage; ?></h1>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2>Connexion</h2>
                <form action="index.php?controller=Authentificator&method=login" method="POST">
                    <div class="form-group">
                        <label for="email">Votre email :</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" name="password"required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
                </form>
                <p class="mt-3">Vous n'avez pas de compte ? <a href="?controller=User&method=createUser">Inscrivez-vous ici</a></p>
            </div>
            </div>
        </div>
</main>