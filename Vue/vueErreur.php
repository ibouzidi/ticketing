<?php $titre = 'Ticketing - Erreur'; ?>

<div class="message-alert">
    <p>Une erreur est survenue : <span><strong><?= $msgErreur ?></strong></span></p>
</div>
<div class="buttonBack">
    <a class="btn btn-info returnIndex" href="index.php">Retourner sur l'index</a>
    <a class="btn btn-warning returnBack" onclick="history.go(-1)">Retour en arrière</a>
</div>