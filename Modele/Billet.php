<?php

require_once('Modele/Modele.php');

class Billet extends Modele
{
	// Renvoie la liste des tickets
	public function getBillets(){
		$sql = 'SELECT t.TIC_ID AS id_billet, t.TIC_DATE, t.TIC_TITRE, t.TIC_AUTEUR as auteur, t.TIC_CONTENU, t.TIC_ETAT, e.id, e.nom_etat FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT ORDER BY TIC_ID desc';
		$billets = $this->executerRequete($sql);
		return $billets;
	}

	// Renvoie les informations sur un ticket
	public function getBillet($idBillet){
		$sql = 'SELECT t.TIC_ID AS id, t.TIC_DATE AS date_ticket, t.TIC_TITRE AS titre, t.TIC_AUTEUR as auteur, t.TIC_CONTENU AS contenu, t.TIC_ETAT AS etat, e.nom_etat FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT WHERE TIC_ID = ?';
		$billet = $this->executerRequete($sql, array($idBillet));
		if ($billet->rowCount() == 1)
			return $billet->fetch();  // Accès à la première ligne de résultat
		else
			throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
	}

	// Permet d'ajouter un nouveau ticket
    public function ajoutTicket($titre, $auteur, $description, $etat){
        $sql = "INSERT INTO t_ticket(TIC_DATE, TIC_TITRE, TIC_AUTEUR, TIC_CONTENU, TIC_ETAT) values(NOW(), ?, ?, ?, ?)";
		$sql = $this->executerRequete($sql, array($titre, $auteur, $description, $etat));
	}

	// Permet de supprimer un ticket
	public function suppTicket($idBillet){
		$sql = 'DELETE FROM t_ticket WHERE TIC_ID = ?';
		$sql = $this->executerRequete($sql, array($idBillet));
	}

	// Permet de récupérer les états sur un ticket en particulier
	public function Etats($etats){
		$sql = 'SELECT * FROM etats WHERE id != ?';
		$afficher_etats = $this->executerRequete($sql, array($etats));
		return $afficher_etats;
	}

	// MAJ d'un ticket
	public function majTicket($idBillet, $titre, $auteur, $description, $etat){
		$sql = "UPDATE t_ticket SET TIC_DATE = NOW(), TIC_TITRE = ?, TIC_AUTEUR = ?, TIC_CONTENU = ?, TIC_ETAT = ?
        WHERE TIC_ID = $idBillet";
		$modifier = $this->executerRequete($sql, array($titre, $auteur, $description, $etat));
		return $modifier;
	}
		
	// Affiche le nb de ticket total
	public function getNbTickets(){
		$sql = "SELECT COUNT(*) as nbtickets FROM t_ticket";
		$nbtickets = $this->executerRequete($sql);
		if ($nbtickets->rowCount() > 0) {
			return $nbtickets->fetch();
		}else{
			throw new Exception('0');
		}
	}

	// Affiche le nb de ticket ouvert
	public function getNbTicketsOuvert(){
		$sql = "SELECT COUNT(*) as nbticketouvert FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT 
		WHERE e.nom_etat LIKE '%ouvert%' ";
		$nbtickets = $this->executerRequete($sql);
			if ($nbtickets->rowCount() > 0) {
			return $nbtickets->fetch();
			}else{
				throw new Exception('0');
			}
	}

	// Affiche le nb de ticket fermer
	public function getNbTicketsFermer(){
		$sql = "SELECT COUNT(*) as nbticketferme FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT
		WHERE e.nom_etat LIKE '%fermé%' ";
		$nbtickets = $this->executerRequete($sql);
		if ($nbtickets->rowCount() > 0) {
			return $nbtickets->fetch();
		}else{
			throw new Exception('0');
		}
	}


}
