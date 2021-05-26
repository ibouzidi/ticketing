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
                // action ajouter un ticket
                else if ($_GET['action'] == 'ajouterTicket') { 
                    $titre = $this->getParametre($_POST, 'titre');
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $description = $this->getParametre($_POST, 'description');
                    $etat = $this->getParametre($_POST, 'etat');
                    $this->ctrlBillet->ajoutTicket($titre, $auteur, $description, $etat);
                }
                // édition du ticket
                else if($_GET['action'] == 'editerTicket'){
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->editTicket($idBillet);
                }
                // action du MAJ du ticket
                  else if($_GET['action'] == 'majTicket'){
                    $idBillet = intval($this->getParametre($_POST, 'id'));
                    $titre = $this->getParametre($_POST, 'titre');
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $etat = $this->getParametre($_POST, 'etats');
                    $description = $this->getParametre($_POST, 'description');
                    $this->ctrlBillet->majTicket($idBillet, $titre, $auteur, $description, $etat);
                }
                // action supp un ticket
                else if ($_GET['action'] == 'supprimer') { 
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlBillet->supprimerTicket($idBillet);
                } 
                // action supp TOUS les tickets
                else if ($_GET['action'] == 'supprimerTicketJoin') {
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->suppTicketJoin($idEtat);
                }
                // page liste des états
                else if ($_GET['action'] == 'gestionsetat') { 
                    $this->ctrlEtat->etat();
                } 
                else if ($_GET['action'] == 'ajouterEtat') { // action ajout états
                    $nom = $this->getParametre($_POST, 'nom');
                    $this->ctrlEtat->ajouterEtat($nom);
                }
                //action supp un état
                else if ($_GET['action'] == 'supprimerEtat') { 
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->supprimerEtat($idEtat);
                }
                //action éditer un etat en particulier
                else if ($_GET['action'] == 'editetat') {
                    $idEtat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->editEtat($idEtat);
                } 
                //modifier un état en particulier
                else if ($_GET['action'] == 'modifieretat') {
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
