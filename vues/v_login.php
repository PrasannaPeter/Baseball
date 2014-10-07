<html>
<?php
if(isset($_SESSION["cli"]) && $_SESSION["cli"] != "")
{
	?>
	<a href="index.php?uc=inscrire&action=deconnexion">Deconnecter</a>
	<?php
}
else
{
	?>
	<form method=post action="index.php?uc=inscrire&action=verificationLogin">
	<a href="index.php?uc=inscrire&action=formulaire">Inscrire</a>
	</br>
	Login
	<input id="login" type="text" name="login" size="10" maxlength="10">
	</br>
	Mot De passe
	<input id="mdp" type="password" name="mdp" size="10" maxlength="10">
	</br>

	<input class="btn btn-success" type=submit value=Envoyer>
	<input class="btn btn-danger" type=reset value=Effacer>
	</form>
	</html>
	<?php
}


