<?php 

require_once('Modele/Modele.php');

class Commentaire extends Modele {

	// affiche la liste des commentaire
	public function getCommentaires($idBillet) {
		$sql = 'select COM_ID as id, COM_DATE as date,'
			. ' COM_AUTEUR as auteur, COM_CONTENU as contenu from t_commentaire'
			. ' where TIC_ID=?';
		$commentaires = $this->executerRequete($sql, array($idBillet));
		return $commentaires;
	}
	// ajout d'un commentaire
	public function ajouterCommentaire($auteur, $contenu, $idBillet) {
		$sql = 'INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, tic_ID) values(NOW(), ?, ?, ?)';
		$this->executerRequete($sql, array($auteur, $contenu, $idBillet));
		   header("location: index.php?action=billet&id=". $idBillet);
	}

	// Permet de supprimer un commentaire
	   public function supprimerComm($idcom)
	   {
		  $sql = 'DELETE FROM t_commentaire WHERE COM_ID = ?';
		  $sql = $this->executerRequete($sql, array($idcom));
	   }
}