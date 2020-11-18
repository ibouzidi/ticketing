<?php $titre = 'Gestionnaire des tickets'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
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
                    <?php foreach ($etats as $etat) : ?>
                        <tr>

                            <th scope="row"><?= $etat['id'] ?></th>
                            <td><?= $etat['nom_etat'] ?></td>
                            <td><a href="index.php?action=editeretat&id=<?= $etat['id'] ?>" class="btn btn-warning">Modifier un etat</a>
                                <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')" style="color:red" href="index.php?action=supprimerEtat&id=<?= $etat['id'] ?>">Supprimer un
                                    ticket</a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2>Ajouter un nouveau Etat</h2>
            <form method="post" action="index.php?action=ajouterEtat">
                <div class="form-group">
                    <input class="form-control" id="name" name="nom" type="text" placeholder="Le nom de l'etat" required />
                </div>
                <input type="submit" value="Envoyer" name="submit" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>