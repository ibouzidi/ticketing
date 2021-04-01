<?php foreach ($billetfiltre as $billet): ?>


<?=$billet['TIC_TITRE']?> <span class="swd btn btn-success"><?=$billet['nom_etat']?></span>

<?php endforeach;?>