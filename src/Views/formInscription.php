<main>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Inscription</h2>
                <form action="?controller=User&method=createUser" method="POST" id="formInscription">
                    <div class="form-group">
                        <label for="name">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
                <p class="mt-3">Déjà inscrit ? <a href="?controller=Authentificator&method=login">Connectez-vous ici</a></p>
            </div>
        </div>
    </div>
</main>