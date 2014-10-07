<html>
<?php
if(isset($_SESSION["admin"]) && $_SESSION["admin"] != "")
{
	?>
	<a href="index.php?uc=administrer&action=deconnexion">Deconnecter</a>
	<?php
}
else
{
	?>
<form method=post action="index.php?uc=administrer&action=verificationAdministrateur">

Login
<input id="login" type="text" name="login" size="10" maxlength="10">
</br>
Mot De passe
<input id="mdp" type="password" name="mdp" size="10" maxlength="10">
</br>


<input class="btn btn-primary"  type=submit value=Envoyer>
<input class="btn btn-danger" type=reset value=Effacer>
</form>
</html>

<?php
}
?>