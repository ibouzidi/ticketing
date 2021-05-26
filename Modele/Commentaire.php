<?php 

require_once('Modele/Modele.php');

class Commentaire extends Modele {


    // récupère tous les commentaires lier au ticket
    public function getCommentaire($idBillet){
        $sql = 'select COM_ID as id, COM_DATE as date,'
			. ' COM_AUTEUR as auteur, COM_CONTENU as contenu from t_commentaire'
			. ' where TIC_ID=? ORDER BY COM_DATE DESC';
		$commentaires = $this->executerRequete($sql, array($idBillet));
		return $commentaires;
    }
	// ajout d'un commentaire
	public function ajoutComm($auteur, $contenu, $idBillet) {
		$sql = 'INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, tic_ID) values(NOW(), ?, ?, ?)';
		$this->executerRequete($sql, array($auteur, $contenu, $idBillet));
    }
    
    // Permet de supprimer un commentaire
	public function supprimerComm($idcom)
	{
		$sql = 'DELETE FROM t_commentaire WHERE COM_ID = ?';
		$sql = $this->executerRequete($sql, array($idcom));
    }
    
    // retourn le nb de commantaire
	public function getNbComm($idBillet)
	{
		$sql = "SELECT COUNT(*) as nbComm FROM t_commentaire WHERE tic_ID = ? ";
        $nbComm= $this->executerRequete($sql, array($idBillet));
        if ($nbComm->rowCount() > 0) {
            return $nbComm->fetch();
            }else{
                throw new Exception('0');
            }
	}

}