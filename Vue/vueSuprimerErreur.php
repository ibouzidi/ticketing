<div class="container">
<div class="message-alert">
    <p>Suppression impossible, car <span>[Etat : <?= $etat['id'] . '  ' . $etat['nom_etat'] ?>]</span> appartient
        à un ou plusieurs tickets</p>
</div>
    <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')" style="color:red"
        href="index.php?action=supprimerTicketJoin&id=<?= $etat['id']?>"><i class="fa fa-trash fa-lg"></i>TOUS SUPPRIMER !</a>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($etatspp as $es):?>
       
            <tr>
            <td><?= $es['TIC_ID']?></td>
            <td><?= $es['TIC_TITRE']?></td>
            <td><a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')" style="color:red"
                    href="index.php?action=supprimer&id=<?= $es['TIC_ID'] ?>"><i class="fa fa-trash fa-lg"></i>
                    Supprimer ce ticket</a></td>
          </tr>
          <?php endforeach; ?> 
        </tbody>
      </table>
</div>
<a class="btn btn-info" href="index.php">Retourner sur l'index</a>
