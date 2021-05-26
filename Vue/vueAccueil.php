<?php $titre = 'Gestionnaire des tickets'; ?>

<a data-backdrop="static" class="addbutton" href="" data-toggle="modal" data-target="#modalAddTicket">Ajouter un ticket<i class="fa fa-plus"></i></a>
        <!-- modal -->
        <div class="modal fade" id="modalAddTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php include('formAddticket.php');?>
                </div>
            </div>
        </div>

<div class="listeticket py-3">
    <?php foreach ($billets as $billet): ?>
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
                    <span class="swd btn btn-info"><?=$billet['nom_etat']?></span>
                    <a href="index.php?action=billet&id=<?=$billet['id_billet']?>">
                        <?=$billet['TIC_TITRE']?>
                    </a>
                    <?php }?>
                    <p class="info">Ouvert par <strong><?= $billet['auteur']?></strong>
                        <time><?= utf8_encode(strftime('%a %d %b %Y %H:%M:%S', strtotime($billet['TIC_DATE'])))?></time>
                        <!-- <i class="fa fa-comments"></i><a href="#">2 commentaires</a> -->
                    </p>
                    <a onclick="return confirm('&Ecirc;tes-vous sûr de vouloir supprimer ce ticket ?')"
                    href="index.php?action=supprimer&id=<?=$billet['id_billet']?>"
                    class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash fa-lg"></i></a>
                    <a class="btn btn-warning btn-sm pull-right editTicketbtn"  
                    href="index.php?action=editerTicket&id=<?= $billet['id_billet']?>"> 
                        <i class="fa fa-edit fa-lg"></i></a>
                </div>
            </div>
        </li>
    </ul>


    <?php endforeach;?>
</div>




