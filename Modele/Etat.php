<?php

require_once('Modele/Modele.php');

class Etat extends Modele
{
    // Renvoie la liste des billets du blog
    public function getEtats()
    {
        $sql = 'SELECT id, nom_etat FROM etats ORDER BY id DESC';
        $etats = $this->executerRequete($sql);
        return $etats;
    }

    public function getEtat($idEtat)
    {
        $sql = "SELECT * FROM etats WHERE id = $idEtat";
        $etat = $this->executerRequete($sql)->fetch();
        return $etat;
    }
    // Permet d'ajouter un nouveau etat
    public function ajouterEtat($nom)
    {
        $sql = 'INSERT INTO etats(nom_etat) values(?)';
        $sql = $this->executerRequete($sql, array($nom));
    }
    public function supprimerEtat($idEtat)
    {
        $sql = 'DELETE FROM etats WHERE id = ?';
        $sql = $this->executerRequete($sql, array($idEtat));
    }

    public function ModifierEtat($idEtat, $nomEtat)
    {
        $sql = 'UPDATE etats SET id = ?, nom_etat = ? WHERE id = ?, nom_etat = ?';
        $modifier = $this->executerRequete($sql, array($idEtat, $nomEtat));
    }


}
