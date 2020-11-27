<?php $titre = 'Supprimer un etat'; ?>


<div class="container">


    <p>Suppression impossible, car <strong>Etat : </strong><?= $etat['id'] . '  ' . $etat['nom_etat'] ?> appartient à un ou plusieurs ticket</p>


    <?php foreach($etatspp as $es):
        ?>

        <ul>
            <li><?= $es['TIC_TITRE']. ' ' .$es['TIC_ID'] ?></li>
            <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')"
            style="color:red" href="index.php?action=supprimer&id=<?= $es['TIC_ID'] ?>">
            Supprimer ce ticket</a>
            
        </ul>

    <?php endforeach;?>
</div>