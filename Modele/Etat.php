<?php

require_once('Modele/Modele.php');

class Etat extends Modele
{
    // Renvoie la liste des états
    public function getEtats()
    {
        $sql = 'SELECT id, nom_etat FROM etats ORDER BY id DESC';
        $etats = $this->executerRequete($sql);
        return $etats;
    }

    // Récupère un etat en particilier 
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

    // Permet de supprimer un etat
    public function supprimerEtat($idEtat)
    {
        $sql = 'DELETE FROM etats WHERE id = ?';
        $sql = $this->executerRequete($sql, array($idEtat));
    }
    
    // Permet de mettre à jour un état
    public function modifierEtat($idEtat, $nom)
    {
        $sql = "UPDATE etats SET nom_etat = ? WHERE id = $idEtat";
        $modifier = $this->executerRequete($sql, array($nom));
        return $modifier;
    }

    // permet de récupérer un ticket en fonction de l'état
    public function getEtatSpp($idEtat)
    {
        $sql = "SELECT e.id, e.nom_etat, t.TIC_ID,t.TIC_TITRE FROM etats e
        JOIN t_ticket t ON e.id = t.TIC_ETAT
        WHERE id = $idEtat
        GROUP BY t.TIC_ID";
        $etat = $this->executerRequete($sql);
        return $etat;
    }


}
