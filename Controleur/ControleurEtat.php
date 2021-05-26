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

    // Affiche tous les états
    public function etat()
    {
        $etats = $this->etat->getEtats();
        $vue = new Vue("Etat");
        $vue->generer(array('etats' => $etats));
    }
    
    // Sauvegarde l'etat
    public function ajouterEtat($nom)
    {   
        try{
            if(!empty($_POST['nom'])){
                $this->etat->ajouterEtat($nom);
                header('Location: index.php?action=gestionsetat');
    
            }else{
                throw new Exception("Le champs nom ne peut pas être vide");
            }
        }catch (Exception $e) { //si erreur alors
            throw new Exception("L'état [". $nom ."] existe déjà dans la base de donnée");
        }
    }
    
    // formulaire édition d'un état
    public function editEtat($idEtat)
    {
        $etat = $this->etat->getEtat($idEtat);
        $vue = new Vue("editEtat");
        $vue->generer(array('etat' => $etat));
    }

    // mise à jour d'un état
    public function modifieretat($idEtat, $nomEtat)
    {
        $this->etat->modifierEtat($idEtat, $nomEtat);
        header("location: index.php?action=gestionsetat");
        die();
    }

    // supprimer un état et gére la suppresion d'un état si il est relier à un ticket
    public function supprimerEtat($idEtat)
    {
        try {
            $this->etat->supprimerEtat($idEtat);
            header('Location: index.php?action=gestionsetat');
        } catch (Exception $e) { //si erreur alors

            $etat = $this->etat->getEtat($idEtat);
            $etatspp = $this->etat->getEtatSpp($idEtat);
            $vue = new Vue("SuprimerErreur");
            $vue->generer(array('etat' => $etat, 'etatspp' => $etatspp));

        }
    }
        // suppression de tous les tickets
        public function suppTicketJoin($idEtat){
            $this->etat->suppTicketJoin($idEtat);
            header('Location: .');
        }

}