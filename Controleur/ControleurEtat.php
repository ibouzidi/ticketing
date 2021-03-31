<?php

require_once 'Modele/Etat.php';
require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurEtat
{

    private $etat;
    private $billet;

    public function __construct()
    {
        $this->etat = new Etat();
        $this->billet = new Billet();
    }

    // Affiche liste des etats
    public function etat(){
        $etats = $this->etat->getEtats();
        $vue = new Vue("Etat");
        $vue->generer(array('etats' => $etats));
    }
    // vue form ajout etat
    public function formajoutetat(){
        $vue = new Vue("AddEtat");
        $vue->generer(array());
    }
    // Sauvegarde de l'etat
    public function ajouterEtat($nom){
        $this->etat->ajouterEtat($nom);
        header('Location: index.php?action=gestionsetat');
        die();
    }

    // vue edit etat
    public function editEtat($idEtat){
        $etat = $this->etat->getEtat($idEtat);
        $vue = new Vue("editEtat");
        $vue->generer(array('etat' => $etat));
    }
    // update etat
    public function modifieretat($idEtat, $nomEtat){
        $this->etat->modifierEtat($idEtat, $nomEtat);
        header("location: index.php?action=gestionsetat");
    }

    // suppression de l'etat
    public function supprimerEtat($idEtat){
        try {
            $this->etat->supprimerEtat($idEtat);
            header('Location: index.php?action=gestionsetat');
        } catch (Exception $e) {
            $etat = $this->etat->getEtat($idEtat);
            $etatspp = $this->etat->getEtatSpp($idEtat);
            $vue = new Vue("SuprimerErreur");
            $vue->generer(array('etat' => $etat, 'etatspp' => $etatspp));
        }
    }
}