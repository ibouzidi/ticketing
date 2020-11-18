<?php

require_once 'Modele/Etat.php';
require_once 'Vue/Vue.php';

class ControleurEtat
{

    private $etat;

    public function __construct()
    {
        $this->etat = new Etat();
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
        $this->etat->supprimerEtat($idEtat);
        header('Location: index.php?action=gestionsetat');
        die();
    }
    public function editeretat($idEtat)
    {
        $etat = $this->etat->getEtat($idEtat);
        $vue = new Vue("EditerEtat");
        $vue->generer(array('etat' => $etat));
    }

    public function modifieretat($idEtat, $nomEtat)
    {
        $etat = $this->etat->getEtat($idEtat);
        $vue = new Vue("EditerEtat");
        $vue->generer(array('etat' => $etat));
        $this->etat->modifierEtat($idEtat, $nomEtat);
        // Actualisation de l'affichage de l'etat

    }
}
