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
  public function accueil($etat) {
    if(isset($etat)){
      $billets = $this->billet->getTicketParEtat($etat);
    }else{


    $billets = $this->billet->getBillets();
    }
    $etats = $this->etat->getEtats();

    // nb de ticket ouvert fermer et total
    $nbtickets = $this->billet->getNbTickets();
    $nbticketsOuvert = $this->billet->getNbTicketsOuvert();
    $nbticketsFermer = $this->billet->getNbTicketsFermer();
    
    $vue = new Vue("Accueil");
    $vue->generer(array(
      'billets' => $billets, 
      'etats'   => $etats,
      'nbtickets' => $nbtickets,
      'nbticketsOuvert' => $nbticketsOuvert,
      'nbticketsFermer' => $nbticketsFermer
    ));
  }
}