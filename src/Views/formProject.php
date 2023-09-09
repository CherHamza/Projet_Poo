<form action="?controller=Project&method=createnewproject" method="post" class="container mt-5">
    <div class="form-group">
        <label for="title">Nom du projet :</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Créer le projet</button>
</form>
