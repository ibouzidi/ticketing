<?php $titre = 'Supprimer un etat'; ?>


<div class="container">


    <p>Suppresion impossible, car <strong>Etat : </strong><?= $etat['id'] . '  ' . $etat['nom_etat'] ?> appartient à un ou plusieurs ticket</p>


</div>