<div class="container">


    <div class="col-md-6">
        <h2>Editer un Etat</h2>
        <form method="post" action="index.php?action=ajouterEtat">
            <input type="hidden" name="id" value="<?= $etat['id']; ?>" />
            <div class="form-group">
                <input class="form-control" id="name" name="nom" value="<?= $etat['nom_etat']; ?>" type="text" placeholder="Le nom de l'etat" required />
            </div>
            <input type="submit" value="Envoyer" name="submit" class="btn btn-primary" />
        </form>
    </div>
</div>