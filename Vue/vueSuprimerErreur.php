<?php $titre = 'Supprimer un etat'; ?>


<div class="container">


    <p>Suppression impossible, car <strong>Etat : </strong><?= $etat['id'] . '  ' . $etat['nom_etat'] ?> appartient à un ou plusieurs ticket</p>


    <?php foreach($etatspp as $es):
        ?>

        <ul>
            <li><?= $es['TIC_TITRE']. ' ' .$es['TIC_ID'] ?></li>
            
        </ul>

    <?php endforeach;?>
</div>