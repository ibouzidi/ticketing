<?php $titre = 'Gestionnaire des tickets'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>GESTIONS DES ETATS</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nomEtat
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- affiche les états -->
                    <?php foreach ($etats as $etat) : ?>
                    <tr>

                        <th scope="row"><?= $etat['id'] ?></th>
                        <td><?= $etat['nom_etat'] ?></td>
                        <td>
                            <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')"
                                class="btn btn-danger btn-sm "
                                href="index.php?action=supprimerEtat&id=<?= $etat['id'] ?>"><i
                                    class="fa fa-trash fa-lg"></i></a>
                            <a href="index.php?action=editetat&id=<?= $etat['id'] ?>" class="btn btn-warning btn-sm "><i
                                    class="fa fa-edit fa-lg"></i></a>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>