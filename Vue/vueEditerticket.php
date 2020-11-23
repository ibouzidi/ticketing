


<div class="container">
<h2>Editer un ticket</h2>
            <form method="post" action="index.php?action=modifierticket">
                <div class="form-group">
                    <input class="form-control" id="titre" value="<?= $billet['titre']?>" name="titre" type="text" placeholder="L'objet de la demande"
                        required />
                </div>
                <div class="form-group">
                <select name="etats" class="form-control">
                        <?php foreach($etats as $etat): ?>
                        <option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="id" value="<?= $billet['id'] ?>" />

                <div class="form-group">
                    <textarea id="txtCommentaire" rows="7" name="demande" class="form-control"
                        placeholder="Veillez mettre en claire le problème ou la question voulue" required><?= $billet['titre']?></textarea>
                </div>
                <input type="submit" value="Envoyer" name="valider_ticket" class="btn btn-primary" />
            </form>



</div>