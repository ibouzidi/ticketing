<div class="col-md-12">
<form method="post" action="index.php?action=majTicket">
        <div class="form-group">
        <label for="">Titre</label>
        <input class="form-control" value="<?= $billet['titre']?>" id="titre" name="titre" type="text" placeholder="L'objet de la demande"  
         required />
        </div>
         <div class="form-group">
        <label for="">Status</label>
        <select name="etats" class="form-control">
                <?php foreach ($etats as $etat) : ?>
                <?php if ($billet['nom_etat'] == $etat['nom_etat']) { ?>
                <option selected="<?= $etat['nom_etat'] ?>" value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
                <?php } else { ?>
                <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
                <?php } ?>
                <?php endforeach; ?>
        </select>
         </div>
        <div class="form-group">
            <label for="">Auteur</label>
            <input class="form-control" value="<?= $billet['auteur']?>" id="auteur" name="auteur" type="text" placeholder="Auteur" required />        
        </div>
        <div class="form-group">
        <label for="">Description</label>
        <textarea id="txtCommentaire" rows="7" name="description" class="form-control"
                placeholder="Veillez mettre en claire le problème ou la question voulue" required><?= $billet['contenu']?></textarea>
        </div>            
        <input type="hidden" name="id" value="<?= $billet['id'] ?>" />

        <input type="submit" value="Envoyer" name="submit" class="btn btn-primary btn-block" />

</form>

</div>

