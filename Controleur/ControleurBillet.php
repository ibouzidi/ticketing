<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'etats' => $etats, 'commentaires' => $commentaires));
    }

    public function modifieretat($etat, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ModifierEtat($etat, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    public function ajouterTicket($titre, $demande) {
        // Sauvegarde du commentaire
        $this->billet->ajouterticket($titre, $demande);
        header('Location: .');
        die();
    }

}