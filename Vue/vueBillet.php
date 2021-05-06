<div class="container">

    <div class="contenu">
        <?php $titre = "Ticket - " . $billet['titre']; ?>
        <h1 class="titreBillet"><?= $billet['titre'] ?> - Ticket

            <?php if ($billet['nom_etat'] == "ouvert") { ?>
                <span class="btn btn-success"><?= $billet['nom_etat'] ?></span>
            <?php } elseif ($billet['nom_etat'] == "en attente") { ?>
                <span class="btn btn-warning"><?= $billet['nom_etat'] ?></span>
            <?php } ?>

        </h1>

        <time><?= strftime("%a %d %b %Y %H:%M:%S", strtotime($billet['date_ticket']));  ?></time>
        <p><?= $billet['contenu'] ?></p>
        <hr>
    </div>
</div>