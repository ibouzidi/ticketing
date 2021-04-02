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
                }
                // routes des tickets
                else if ($_GET['action'] == 'gestiontickets') {
                    $this->ctrlAccueil->accueil();
                }
                else if ($_GET['action'] == 'formajoutticket' || $_GET['action'] == 'ajouterticket') {
                    if(isset($_POST['submit'])){
                        $titre = $this->getParametre($_POST, 'titre');
                        $description = $this->getParametre($_POST, 'description');
                        $etat = $this->getParametre($_POST, 'etat');
                        $this->ctrlBillet->ajouterTicket($titre, $description, $etat);
                       }
                       $this->ctrlBillet->formajoutticket();
                } else if ($_GET['action'] == 'editerticket') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->editerticket($idBillet);
                } else if ($_GET['action'] == 'modifierticket') {
                    $idBillet = intval($this->getParametre($_POST, 'id'));
                    $titre = $this->getParametre($_POST, 'titre');
                    $etats = $this->getParametre($_POST, 'etats');
                    $content = $this->getParametre($_POST, 'content');
                    $this->ctrlBillet->modifierTicket($idBillet, $titre, $etats, $content);
                } else if ($_GET['action'] == 'supprimer') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimerTicket($idBillet);
                } 
                // route commentaire
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                } else if ($_GET['action'] == 'suppcomm') {
                    $idcom = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimerComm($idcom);
                }
                // routes des etats
                else if ($_GET['action'] == 'gestionsetat') {
                    $this->ctrlEtat->etat();
                }else if ($_GET['action'] == 'formajoutetat' || $_GET['action'] == 'ajoutetat') {
                     if(isset($_POST['submit'])){
                    $nom = $this->getParametre($_POST, 'nom');
                    $this->ctrlEtat->ajouterEtat($nom);
                     }
                     $this->ctrlEtat->formajoutetat();
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
                } 
                // routes filtre
                else if ($_GET['action'] == 'rechercher') {
                    $qetat = $this->getParametre($_POST, 'qetat');
                    $this->ctrlBillet->filtreParEtat($qetat);
                } 
                else
                    throw new Exception("Action non valide");
            } 
            else {
                // try {
                //     $qetat = $this->getParametre($_GET, 'qetat');
                // }
                // catch (Exception $e) {
                //     $qetat=null;
                // }
                // aucune action définie : affichage de l'accueil
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