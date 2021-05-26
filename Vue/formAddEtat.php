<div class="modal-header text-center">
    <h4 class="modal-title w-100 font-weight-bold">Ajouter un nouveau etat</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body mx-3">
<form method="post" action="index.php?action=ajouterEtat">
    <div class="form-group">
        <input class="form-control" id="name" name="nom" type="text" placeholder="Le nom de l'etat" />
    </div>
    <div class="modal-footer d-flex justify-content-center">
        <input type="submit" value="Envoyer" name="submit" class="btn btn-primary btn-block" />
    </div>
</form>


