<?php $titre = 'Gestionnaire des tickets'; ?>

<div class="container">
    <div class="row">
        <!-- BEGIN TICKET CONTENT -->
        <div class="col-md-7">
            <ul class="list-group fa-padding">
                <?php foreach ($billets as $billet) : ?>

                <li class="list-group-item">
                    <div class="media">
                        <i class="fa fa-tag pull-left"></i>
                        <div class="media-body">
                            <?php if ($billet['TIC_ETAT'] == 1 || $billet['TIC_ETAT'] == 2) { ?>
                            <strong><a
                                    href="index.php?action=billet&id=<?= $billet['id_billet'] ?>"><?= $billet['TIC_TITRE'] ?></a></strong>
                            <?php if ($billet['TIC_ETAT'] == 1) { ?>
                            <span class="btn btn-success"><?= $billet['nom_etat'] ?></span>
                            <?php } elseif ($billet['TIC_ETAT'] == 2) { ?>
                            <span class="btn btn-warning"><?= $billet['nom_etat'] ?></span>
                            <?php } ?>
                            <?php } else { ?>
                            <a href="index.php?action=billet&id=<?= $billet['id_billet'] ?>"><?= $billet['TIC_TITRE'] ?>
                                <span class="btn btn-danger"><?= $billet['nom_etat'] ?></span>
                                <?php } ?>


                                <p class="info">Ouvert par <a href="#">idris
                                    </a><time><?= strftime("%a %d %b  %Y %H:%M:%S", strtotime($billet['TIC_DATE'])); ?></time>
                                    <!-- <i class="fa fa-comments"></i><a href="#">2 commentaires</a> -->
                                </p>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>

        </div>
        <div class="col-md-5">
            <h2>Ajouter un nouveau ticket</h2>
            <form method="post" action="index.php?action=ajouter">
                <div class="form-group">
                    <input class="form-control" id="titre" name="titre" type="text" placeholder="L'objet de la demande"
                        required />
                </div>
                <div class="form-group">
                    <textarea id="txtCommentaire" rows="7" name="demande" class="form-control"
                        placeholder="Veillez mettre en claire le problème ou la question voulue" required></textarea>
                </div>
                <input type="submit" value="Envoyer" name="valider_ticket" class="btn btn-primary" />
            </form>
        </div>
    </div>

</div>