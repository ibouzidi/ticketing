<?php

require_once 'Modele/Modele.php';

class Billet extends Modele
{
    // Affiche la liste des tickets
    public function getBillets()
    {
        $sql = 'SELECT t.TIC_ID AS id_billet, t.TIC_DATE, t.TIC_TITRE, t.TIC_CONTENU, t.TIC_ETAT, e.id, e.nom_etat FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT ORDER BY TIC_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    // Affiche un billet en particulier
    public function getBillet($idBillet)
    {
        $sql = 'SELECT t.TIC_ID AS id, t.TIC_DATE AS date_ticket, t.TIC_TITRE AS titre, t.TIC_CONTENU AS contenu, t.TIC_ETAT AS etat, e.nom_etat FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT WHERE TIC_ID = ?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() == 1) {
            return $billet->fetch();
        }
        // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }

    }
    // Permet d'ajouter un nouveau ticket
    public function ajouterTicket($titre, $description, $etat)
    {
        $sql = "INSERT INTO t_ticket(TIC_DATE, TIC_TITRE, TIC_CONTENU, TIC_ETAT) values(NOW(), ?, ?, ?)";
        $sql = $this->executerRequete($sql, array($titre, $description, $etat));
    }
    // Permet de metre à jour un ticket
    public function modifierTicket($idBillet, $titre, $content, $etats)
    {
        $sql = "UPDATE t_ticket SET TIC_DATE = NOW(), TIC_TITRE = ?, TIC_CONTENU = ?, TIC_ETAT = ?
        WHERE TIC_ID = $idBillet";
        $modifier = $this->executerRequete($sql, array($titre, $etats, $content));
    }
    // Permet de supprimer un ticket
    public function supprimerTicket($idBillet)
    {
        $sql = 'DELETE FROM t_ticket  WHERE TIC_ID = ?';
        $sql = $this->executerRequete($sql, array($idBillet));
        $sql = 'DELETE FROM t_commentaire  WHERE tic_ID = ?';
        $sql = $this->executerRequete($sql, array($idBillet));
    }

    // Permet de modifier l'état d'un ticket
    public function ModifierEtat($etat, $idBillet)
    {
        $sql = 'UPDATE t_ticket SET TIC_ETAT = ? WHERE TIC_ID = ?';
        $modifier = $this->executerRequete($sql, array($etat, $idBillet));
    }

    // Permet de récupérer les états
    public function Etats($etats)
    {
        $sql = 'SELECT * FROM etats WHERE id != ?';
        $afficher_etats = $this->executerRequete($sql, array($etats));
        return $afficher_etats;
    }

    public function rqFiltreParEtat($qetat)
    {
        $sql = "SELECT t.TIC_ID AS id_billet, t.TIC_DATE, t.TIC_TITRE, t.TIC_CONTENU, t.TIC_ETAT, e.id, e.nom_etat FROM
        t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT WHERE e.nom_etat LIKE '%$qetat%' ";
        $rqetat = $this->executerRequete($sql);
        if ($rqetat->rowCount() > 0) {
            return $rqetat;
        }
        else
        {
            throw new Exception('Aucun ticket ne correspond à l\'etat : ['.$qetat. ']');
        }
        
    }

    // Affiche la liste des tickets
    public function getNbTicketsOuvert()
    {
        $sql = "SELECT COUNT(*) as nbticketouvert FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT 
        WHERE e.nom_etat LIKE '%ouvert%' ";
        $nbtickets = $this->executerRequete($sql);
            if ($nbtickets->rowCount() > 0) {
            return $nbtickets->fetch();
            }else{
                throw new Exception('0');
            }
    }
    // Affiche la liste des tickets
    public function getNbTicketsFermer()
    {
        $sql = "SELECT COUNT(*) as nbticketferme FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT
        WHERE e.nom_etat LIKE '%fermé%' ";
        $nbtickets = $this->executerRequete($sql);
        if ($nbtickets->rowCount() > 0) {
            return $nbtickets->fetch();
        }else{
            throw new Exception('0');
        }
    }

    // Affiche la liste des tickets
    public function getNbTickets()
    {
        $sql = "SELECT COUNT(*) as nbtickets FROM t_ticket";
        $nbtickets = $this->executerRequete($sql);
        if ($nbtickets->rowCount() > 0) {
            return $nbtickets->fetch();
        }else{
            throw new Exception('0');
    }
    }
}