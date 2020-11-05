<div class="container py-5">

    <div class="contenu">
        Modifier l'état du ticket :
        <div class="col-md-3">
            <form method="post" action="index.php?action=modifieretat">
                <div class="form-group">

                    <select name="etats" class="form-control">
                        <?php foreach($etats as $etat): ?>
                        <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="modifier_etat">
                </div>

            </form>
        </div>
        <?php $titre = "Ticket - " . $billet['titre']; ?>
        <h1 class="titreBillet"><?= $billet['titre'] ?> - Ticket

            <?php if ($billet['nom_etat'] == "ouvert") { ?>
            <span class="btn btn-success"><?= $billet['nom_etat'] ?></span>
            <?php } elseif($billet['nom_etat'] == "en attente"){?>
            <span class="btn btn-warning"><?= $billet['nom_etat'] ?></span>
            <?php } ?>

        </h1>

        <time><?= strftime("%a %d %b %Y %H:%M:%S", strtotime($billet['date_ticket']));  ?></time>
        <p><?= $billet['contenu'] ?></p>
        <hr>
    </div>
    <div class="commentaire">


        <h4>Commentaires du ticket :</h4>
        <?php foreach ($commentaires as $commentaire): ?>
        <p><?= $commentaire['auteur'] ?> dit le
            <time><?= strftime("%a %d %b %Y %H:%M:%S", strtotime($commentaire['date'])); ?>:</p>
        <p><?= $commentaire['contenu'] ?></p>
        <hr>
        <?php endforeach; ?>
        <h5 id="titreReponses">Réponses à <?= $billet['titre'] ?></h5>
        <form method="post" action="index.php?action=commenter">
            <div class="form-group">
                <input id="auteur" name="auteur" type="text" class="form-control" placeholder="Votre pseudo" required />
            </div>
            <div class="form-group">
                <textarea id="txtCommentaire" name="contenu" rows="7" class="form-control"
                    placeholder="Votre commentaire" required></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
            <input type="submit" name="ajouter_commenter" value="Envoyer commentaire" class="btn btn-primary" />
        </form>
    </div>
</div>