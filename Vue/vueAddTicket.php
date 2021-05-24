      <h2>Ajouter un nouveau ticket</h2>
      <form method="post" action="index.php?action=ajoutTicket">
          <div class="form-group">
              <input class="form-control" id="titre" name="titre" type="text" placeholder="L'objet de la demande"
                  required />
          </div>
          <div class="form-group">
              <textarea id="txtCommentaire" rows="7" name="demande" class="form-control"
                  placeholder="Veillez mettre en claire le problème ou la question voulue" required></textarea>
          </div>
          <input type="submit" value="Envoyer" name="valider_ticket" class="btn btn-primary" />
      </form>