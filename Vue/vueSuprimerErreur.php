<div class="message-alert">
    <p>Suppression impossible, car <span>[Etat : <?= $etat['id'] . '  ' . $etat['nom_etat'] ?>]</span> appartient
        à un ou plusieurs ticket</p>
</div>

<?php foreach($etatspp as $es):
        ?>

<ul>
    <li><?= $es['TIC_TITRE']. ' ' .$es['TIC_ID'] ?></li>
    <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')" style="color:red"
        href="index.php?action=supprimer&id=<?= $es['TIC_ID'] ?>">
        Supprimer ce ticket</a>

</ul>

<?php endforeach;?>