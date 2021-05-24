<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurEtat.php';
require_once 'Vue/Vue.php';
class Routeur
{

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlEtat;

    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlEtat = new ControleurEtat();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    } else
                        throw new Exception("Identifiant de billet non valide");
                } else if ($_GET['action'] == 'ajoutTicket') { // action ajouter un ticket
                    $titre = $this->getParametre($_POST, 'titre');
                    $demande = $this->getParametre($_POST, 'demande');
                    $this->ctrlBillet->ajouterTicket($titre, $demande);
                } else if ($_GET['action'] == 'supprimer') { // action supp un ticket
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimerTicket($idBillet);
                } else if ($_GET['action'] == 'gestionsetat') { // page gestion des états
                    $this->ctrlEtat->etat();
                } else if ($_GET['action'] == 'ajouterEtat') { // ajout états
                    $nom = $this->getParametre($_POST, 'nom');
                    $this->ctrlEtat->ajouterEtat($nom);
                } else if ($_GET['action'] == 'supprimerEtat') {
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->supprimerEtat($idEtat);
                } else if ($_GET['action'] == 'editetat') {
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->editEtat($idEtat);
                } else if ($_GET['action'] == 'modifieretat') {
                    $idEtat = intval($this->getParametre($_POST, 'id'));
                    $nom = $this->getParametre($_POST, 'nom');
                    $this->ctrlEtat->modifierEtat($idEtat, $nom);
                } else
                    throw new Exception("Action non valide");
            } else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }
}
