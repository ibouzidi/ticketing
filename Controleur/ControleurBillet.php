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

    // Affiche les détails sur un billet
    public function billet($idBillet)
    {   
        // récupére un ticket en particulier
        $billet = $this->billet->getBillet($idBillet);
        $etats = $this->billet->Etats($billet['nom_etat']);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'etats' => $etats));
    }

    // Sauvegarde du ticket
    public function ajouterTicket($titre, $demande)
    {
        $this->billet->ajouterticket($titre, $demande);
        header('Location: .');
        die();
    }

    // suppression d'un ticket
    public function supprimerTicket($idBillet)
    {   
        $this->billet->supprimerTicket($idBillet);
        header('Location: .');
        die();
    }
}
