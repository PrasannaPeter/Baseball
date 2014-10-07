
<div id="inscription">
<form method="POST" action="index.php?uc=inscrire&action=verificationClient">
   <fieldset>
		<p>
			<label for="login">Login*</label>
			<input id="login" type="text" name="login" value="<?php echo $login ?>" size="30" maxlength="45">
		</p>
		<p>
			<label for="mdp">Mdp *</label>
			<input id="mdp" type="text" name="mdp" value="<?php echo $mdp ?>" size="30" maxlength="45">
		</p>
				<p>
			<label for="mdp2">Resaisir Mdp *</label>
			<input id="mdp2" type="text" name="mdp2" value="<?php echo $mdp2 ?>" size="30" maxlength="45">
		</p>
		<p>
			<label for="nom">Nom *</label>
			<input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="30" maxlength="45">
		</p>
		<p>
			<label for="prenom">Prenom *</label>
			<input id="prenom" type="text" name="prenom" value="<?php echo $prenom ?>" size="30" maxlength="45">
		</p>
		<p>
			<label for="num">Adresse *</label>
			<input id="num" type="text" name="add" value="<?php echo $add ?>" size="30" maxlength="45">
		</p>
		<p>
         <label for="cp">code postal* </label>
         <input id="cp" type="text" name="cp" value="<?php echo $cp ?>" size="10" maxlength="10">
      </p>
      <p>
         <label for="ville">ville* </label>
         <input id="ville" type="text" name="ville"  value="<?php echo $ville ?>" size="5" maxlength="5">
      </p>
	  <p>
         <label for="tel">Telephone* </label>
         <input id="tel" type="text" name="tel"  value="<?php echo $tel ?>" size="5" maxlength="10">
      </p>
      <p>
         <label for="mail">mail* </label>
         <input id="mail" type="text"  name="mail" value="<?php echo $mail ?>" size ="25" maxlength="25">
      </p> 

	 
	  	<p>
         <input class="btn btn-success" type="submit" value="Valider" name="valider">
         <input class="btn btn-danger" type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>





