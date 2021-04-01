<div class="col-md-12">
    <h2>Ajouter un nouveau ticket</h2>
    <form method="post" action="index.php?action=ajouterticket">
        <div class="form-group">
            <input class="form-control" id="titre" name="titre" type="text" placeholder="Titre du ticket" required />
        </div>
        <select name="etat" class="form-control">
            <?php foreach ($etats as $etat): ?>
            <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
            <?php endforeach; ?>
        </select>
        <br />
        <div class=" form-group">
            <textarea rows="7" name="description" class="form-control"
                placeholder="Veuillez préciser clairement le problème ou la question voulue" required></textarea>
        </div>
        <input type="submit" value="Envoyer" name="submit" class="btn btn-primary btn-block" />
    </form>
</div>