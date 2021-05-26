<div class="container">
    <div class="contenu">
        <?php $titre = "Ticket - " . $billet['titre']; ?>
        <h1 class="titreBillet"><?= $billet['titre'] ?>
            - Ticket
        </h1>
        <time><?= strftime("%a %d %b %Y %H:%M:%S", strtotime($billet['date_ticket']));  ?></time>
        <p><?= $billet['contenu'] ?></p>
        <hr>
    </div>


    <div class="commentaire">
    <h4 class="nbcom">
        <i class="fa fa-comments"></i><?= $nbComms['nbComm'] ?>
    </h4>
    <h4>Commentaires du ticket :</h4>
    <?php foreach ($commentaires as $commentaire) : ?>
    <p><?= $commentaire['auteur'] ?> dit le
        <time><?= strftime("%a %d %b %Y %H:%M:%S", strtotime($commentaire['date'])); ?>
    </p>
    <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce commantaire ?')"
        href="index.php?action=suppcomm&id=<?=$commentaire['id']?>" class="btn btn-danger btn-sm pull-right"><i
            class="fa fa-trash fa-lg"></i></a>
    <p><?= $commentaire['contenu'] ?></p>

    <hr>

    <?php endforeach; ?> 
    <h5 id="titreReponses">Répondre à <?= $billet['auteur'] ?></h5>
    <form method="post" action="index.php?action=ajouterCommentaire">
        <div class="form-group">
            <input id="auteur" name="auteur" type="text" class="form-control" placeholder="Votre pseudo" required />
        </div>
        <div class="form-group">
            <textarea id="txtCommentaire" name="contenu" rows="7" class="form-control" placeholder="Votre commentaire"
                required></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
        <input type="submit" name="ajouter_commenter" value="Envoyer commentaire" class="btn btn-primary btn-block" />
    </form>
</div>



</div>