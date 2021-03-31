<?php $titre = 'Gestionnaire des tickets';?>

<div class="section-filtre">
    <div class="col-md-12">
        <div class="btn-group">
            <button type="button" class="btn btn-default active">162 Ouvert</button>
            <button type="button" class="btn btn-default">95,721 Fermé</button>
        </div>


        <div class="btn-group">
            <label class="label-filtre">Trier par:</label>
            <form class="form-inline" action="index.php?action=rechercher" method="post" name="filtre">
                <select name="etat" class="form-control">
                    <option value=" Ouvert" selected>ouvert</option>
                    <option value="Fermé">ferme</option>

                </select>
                <button type="submit" class="btn btn-info btn-filtre mx-2">Envoyer</button>
            </form>

        </div>
    </div>
</div>

<div class="listeticket py-5">
    <?php foreach ($billets as $billet): ?>
    <div class="col-md-12">
        <ul class="list-group fa-padding">
            <li class="list-group-item">
                <div class="media">
                    <i class="fa fa-tag pull-left"></i>
                    <div class="media-body">

                        <?php if ($billet['TIC_ETAT'] == 1 
                        || $billet['TIC_ETAT'] == 2 
                        || $billet['TIC_ETAT'] == 3 
                        || $billet['TIC_ETAT'] == 4) { ?>

                        <?php if ($billet['TIC_ETAT'] == 1) { ?>
                        <span class="swd btn btn-success"><?=$billet['nom_etat']?></span>
                        <?php } elseif ($billet['TIC_ETAT'] == 2) {?>
                        <span class="swd btn btn-danger"><?=$billet['nom_etat']?></span>
                        <?php } elseif ($billet['TIC_ETAT'] == 3) {?>
                        <span class="swd btn btn-warning"><?=$billet['nom_etat']?></span>
                        <?php } elseif ($billet['TIC_ETAT'] == 4) {?>
                        <span class="swd btn btn-info"><?=$billet['nom_etat']?></span>
                        <?php } 
                         ?>

                        <strong class="media-body-title">
                            <a href="index.php?action=billet&id=<?=$billet['id_billet']?>"><?=$billet['TIC_TITRE']?></a>
                        </strong>

                        <?php } else {?>
                        <a href="index.php?action=billet&id=<?=$billet['id_billet']?>"><?=$billet['TIC_TITRE']?>
                        </a><span class="swd btn btn-info"><?=$billet['nom_etat']?></span>
                        <?php }?>
                        <p class="info">Ouvert par <strong>idris</strong>
                            <time><?= utf8_encode(strftime('%a %d %b %Y %H:%M:%S', strtotime($billet['TIC_DATE'])))?></time>
                            <!-- <i class="fa fa-comments"></i><a href="#">2 commentaires</a> -->
                        </p>
                        <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')"
                            href="index.php?action=supprimer&id=<?=$billet['id_billet']?>"
                            class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash fa-lg"></i></a>

                        <a class="btn btn-warning btn-sm pull-right"
                            href="index.php?action=editerticket&id=<?=$billet['id_billet']?>">
                            <i class="fa fa-edit fa-lg"></i></a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <?php endforeach;?>
</div>