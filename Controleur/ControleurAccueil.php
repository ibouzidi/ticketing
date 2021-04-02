<?php

require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

  private $billet;
  private $etat;

  public function __construct() {
    $this->billet = new Billet();
    $this->etat = new Etat();
  }

  // Affiche la liste de tous les tickets
  public function accueil() {
  $billets = $this->billet->getBillets();
  $etats = $this->etat->getEtats();
  $vue = new Vue("Accueil");
  $vue->generer(array('billets' => $billets, 'etats' => $etats));
    
  }
}