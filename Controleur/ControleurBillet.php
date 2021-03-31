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

    // Affiche un ticket en particulier
    public function billet($idBillet){
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'etats' => $etats, 'commentaires' => $commentaires));
    }

    // vue form ajout ticket
    public function formajoutticket(){
        $vue = new Vue("AddTicket");
        $vue->generer(array());
    }

    // Sauvegarde un ticket
    public function ajouterTicket($titre, $description){
        $this->billet->ajouterticket($titre, $description);
        header('Location: index.php?action=gestiontickets');
    }
    // vue edit ticket
    public function editerticket($idBillet){
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $vue = new Vue("Editerticket");
        $vue->generer(array('billet' => $billet, 'etats' => $etats));
    }
    // update ticket
    public function modifierTicket($idBillet, $titre, $etats, $content){
        $this->billet->modifierTicket($idBillet, $titre, $etats, $content);
        header("location: index.php?action=gestiontickets");
    }
    // suppression d'un ticket
    public function supprimerTicket($idBillet){
        $this->billet->supprimerTicket($idBillet);
        header('Location: index.php?action=gestiontickets');
    }
    
    // trier les tickets par etat
    public function filtrer($etat){
        $billets = $this->billet->rqfiltre($etat);
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet){
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
    // Actualisation de l'affichage du billet
    $this->billet($idBillet);
    }

}