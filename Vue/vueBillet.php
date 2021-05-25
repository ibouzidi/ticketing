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
</div>