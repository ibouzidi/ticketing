<?php

require_once('Modele/Modele.php');

class Billet extends Modele {
	// Renvoie la liste des billets du blog
	public function getBillets() {
    $sql = 'SELECT t.TIC_ID AS id_billet, t.TIC_DATE, t.TIC_TITRE, t.TIC_CONTENU, t.TIC_ETAT, e.id, e.nom_etat FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT ORDER BY TIC_ID desc';
    $billets = $this->executerRequete($sql);
    return $billets;
  }

// Renvoie les informations sur un billet
	public function getBillet($idBillet) {
		$sql = 'SELECT t.TIC_ID AS id, t.TIC_DATE AS date_ticket, t.TIC_TITRE AS titre, t.TIC_CONTENU AS contenu, t.TIC_ETAT AS etat, e.nom_etat FROM t_ticket t INNER JOIN etats e ON e.id = t.TIC_ETAT WHERE TIC_ID = ?';
		$billet = $this->executerRequete($sql, array($idBillet));
		if ($billet->rowCount() == 1)
        return $billet->fetch();  // Accès à la première ligne de résultat
    else
    	throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
}
// Permet d'ajouter un nouveau ticket
public function ajouterTicket($titre, $demande) {
	$sql = 'INSERT INTO t_ticket(TIC_DATE, TIC_TITRE, TIC_CONTENU, TIC_ETAT) values(NOW(), ?, ?, 1)';
	$sql = $this->executerRequete($sql, array($titre, $demande));
}
// Permet de modifier l'état d'un ticket
public function ModifierEtat($etat, $idBillet){
	$sql = 'UPDATE t_ticket SET TIC_ETAT = ? WHERE TIC_ID = ?';
	$modifier = $this->executerRequete($sql, array($etat, $idBillet));
}

// Permet de récupérer les états d'un ticket spécifique
public function Etats($etats){
	$sql = 'SELECT * FROM etats WHERE nom_etat != ?';
	$afficher_etats = $this->executerRequete($sql, array($etats));
	return $afficher_etats;
}
}