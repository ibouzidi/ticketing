<?php

require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurBillet
{

    private $billet;

    public function __construct()
    {
        $this->billet = new Billet();
    }

    // Affiche les détails sur un ticket
    public function billet($idBillet)
    {   
        // récupére un ticket en particulier
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'etats' => $etats));
    }

    // Sauvegarde du ticket
    public function ajoutTicket($titre, $auteur, $description, $etat){
        if (!empty($_POST['titre']) && !empty($_POST['description'])) {
                $this->billet->ajoutTicket($titre, $auteur, $description, $etat);
                header('Location: .');
        }else {
            throw new Exception("Les champs ne peuvent pas être vide");
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
        $this->billet->majTicket($idBillet, $titre, $auteur, $description, $etat);
        header("location: index.php");
    }
    // suppression d'un ticket
    public function supprimerTicket($idBillet)
    {   
        $this->billet->suppTicket($idBillet);
        header('Location: .');
    } 

}
