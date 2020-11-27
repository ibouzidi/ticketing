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

    // Affiche les détails sur un etat
    public function etat()
    {
        $etats = $this->etat->getEtats();
        $vue = new Vue("Etat");
        $vue->generer(array('etats' => $etats));
    }
    public function ajouterEtat($nom)
    {
        // Sauvegarde l'etat
        $this->etat->ajouterEtat($nom);
        header('Location: index.php?action=gestionsetat');
        die();
    }
    public function supprimerEtat($idEtat)
    {
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
    public function vuesupprimer($idEtat, $idBillet)
    {
        
    }
    public function editEtat($idEtat)
    {
        $etat = $this->etat->getEtat($idEtat);
        $vue = new Vue("editEtat");
        $vue->generer(array('etat' => $etat));
    }

    public function modifieretat($idEtat, $nomEtat)
    {
        $this->etat->modifierEtat($idEtat, $nomEtat);
        header("location: index.php?action=gestionsetat");
        die();
        
        // Actualisation de l'affichage de l'etat

    }
}