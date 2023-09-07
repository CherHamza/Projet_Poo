<main>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2>Inscription</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name_user">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" name="name_user" required>
                    </div>
                    <div class="form-group">
                        <label for="password_user">Mot de passe :</label>
                        <input type="password" class="form-control" name="password_user" required>
                    </div>
                    <div class="form-group">
                        <label for="email_user">Email :</label>
                        <input type="email" class="form-control" name="email_user" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
                <p class="mt-3">Déjà inscrit ? <a href="?controller=Authentificator&method=login">Connectez-vous ici</a></p>
            </div>
        </div>
    </div>
</main>