<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet
{

    private $billet;
    private $commentaire;

    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un ticket
    public function billet($idBillet)
    {   
        // récupére un ticket en particulier
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $commentaires = $this->commentaire->getCommentaire($idBillet);
        // get le nb de commentaires
        $nbComms = $this->commentaire->getNbComm($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'etats' => $etats, 'commentaires' => $commentaires, 'nbComms' => $nbComms));
    }

    // Sauvegarde du ticket
    public function ajoutTicket($titre, $auteur, $description, $etat){
        if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['description'])) {
                $this->billet->ajoutTicket($titre, $auteur, $description, $etat);
                header('Location: .');
        }else {
            throw new Exception("Les champs ne peuvent pas être vide !");
        }
    }
    
    // edition d'un ticket(vue)
    public function editTicket($idBillet){
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $vue = new Vue("formEditTicket");
        $vue->generer(array('billet' => $billet, 'etats' => $etats));
    }

    // MAJ d'un ticket
    public function majTicket($idBillet, $titre, $auteur, $description, $etat){
        if(!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['description'])){
            $this->billet->majTicket($idBillet, $titre, $auteur, $description, $etat);
            header("location: index.php");
        }else {
            throw new Exception("Les champs ne peuvent pas être vide !");
        }
    }
    // suppression d'un ticket
    public function supprimerTicket($idBillet)
    {   
        $this->billet->suppTicket($idBillet);
        header('Location: .');
    } 

    //ajout d'un commentaire
    public function ajoutComm($auteur, $contenu, $idBillet){
        if(!empty($_POST['auteur']) && !empty($_POST['contenu'])){

            $this->commentaire->ajoutComm($auteur, $contenu, $idBillet);
            header("location: index.php?action=billet&id=". $idBillet);
        }else{
            throw new Exception("Les champs ne peuvent pas être vide !");
        }
    }

    // suppression d'un commentaire sur un ticket
    public function supprimerComm($idcom){
        $this->commentaire->supprimerComm($idcom);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
