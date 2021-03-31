<div class="message-alert">
    <p>Suppression impossible, car <span>[Etat : <?= $etat['id'] . '  ' . $etat['nom_etat'] ?>]</span> appartient
        à un ou plusieurs ticket</p>
</div>






<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom ticket
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($etatspp as $es):?>
        <tr>
            <th><?= $es['TIC_ID']?></th>
            <th scope="row"><?= $es['TIC_TITRE']. ' ' .$es['TIC_ID'] ?></th>
            <th> <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')" style="color:red"
                    href="index.php?action=supprimer&id=<?= $es['TIC_ID'] ?>"><i class="fa fa-trash fa-lg"></i>
                    Supprimer ce ticket</a></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>