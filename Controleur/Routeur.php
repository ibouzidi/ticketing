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
                } else if ($_GET['action'] == 'ajouter') {
                    $titre = $this->getParametre($_POST, 'titre');
                    $demande = $this->getParametre($_POST, 'demande');
                    $this->ctrlBillet->ajouterTicket($titre, $demande);
                } else if ($_GET['action'] == 'editerticket') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->editerticket($idBillet);
                } else if ($_GET['action'] == 'supprimer') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimerTicket($idBillet);
                } else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }
                /*else if ($_GET['action'] == 'modifieretat'){
                    $etat = $this->getParametre($_POST, 'etats');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->modifieretat($etat, $idBillet);
                }*/ else if ($_GET['action'] == 'gestionsetat') {
                    $this->ctrlEtat->etat();
                } else if ($_GET['action'] == 'ajouterEtat') {
                    $nom = $this->getParametre($_POST, 'nom');
                    $this->ctrlEtat->ajouterEtat($nom);
                } else if ($_GET['action'] == 'supprimerEtat') {
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->supprimerEtat($idEtat);
                } else if ($_GET['action'] == 'editeretat') {
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->editeretat($idEtat);
                } else if ($_GET['action'] == 'modifieretat') {
                    $idEtat = intval($this->getParametre($_POST, 'id'));
                    $nom = $this->getParametre($_POST, 'nom');
                    $this->ctrlEtat->modifieretat($idEtat, $nom);
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
