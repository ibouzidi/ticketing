
<div class="modal-header text-center">
    <h4 class="modal-title w-100 font-weight-bold">Ajouter un nouveau ticket</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>

    <div class="modal-body mx-3">
    <form method="post" action="index.php?action=ajouterTicket">
        <div class="md-form mb-2">
        <label for="">Titre</label>
        <input class="form-control" id="titre" name="titre" type="text" placeholder="L'objet de la demande" required />
        </div>
        <div class="md-form mb-2">
        <label for="">Status</label>
        <select name="etat" class="form-control">
            <?php foreach ($etats as $etat): ?>
            <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="md-form mb-2">
        <label for="">Auteur</label>
        <input class="form-control" id="auteur" name="auteur" type="text" placeholder="Auteur" required />        
        </div>
        <div class="md-form mb-2">
        <label for="">Description</label>
        <textarea id="txtCommentaire" rows="7" name="description" class="form-control"
                placeholder="Veillez mettre en claire le problème ou la question voulue" required></textarea>
        </div>
    </div>
    <div class="modal-footer d-flex justify-content-center">
        <input type="submit" value="Envoyer" name="submit" class="btn btn-primary btn-block" />
    </div>
</form>

