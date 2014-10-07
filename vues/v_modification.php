<html>
<a href="index.php?uc=administrer&action=voirProduits">Retour</a>
<form method=post action="index.php?uc=administrer&action=modifier">

<?php

$idproduit = $_REQUEST['produit'];
$unProduit = $pdo->getUnProduitsDuTableau($idproduit);

	$id = $unProduit['ID_PRODUIT'];
	$marque = $unProduit['MARQUE'];
	$description = $unProduit['DESCRIPTION'];
	$position = $unProduit['POSITION_JOUEUR'];
	$prix=$unProduit['PRIX'];
	$image = $unProduit['IMAGE'];

?>
	Modification de votre Produit:
	<ul>
			<li><img src="<?php echo $image ?>" width="300" height="500" /></li>
			<li><?php echo $marque ?></li>
			<li><?php echo $description ?></li>
			<li><?php echo $position ?></li>
			<li><?php echo " : ".$prix." Euros" ?></li>
			

			
	</ul>		
			</br>
			Marque
			<input id="marque" type="text" name="marque" value="<?php echo $marque ?>">
			</br></br>
			Description
			<input id="description" type="text" name="description" value="<?php echo $description ?>">
			</br>
			</br>
			Position
			<input id="position" type="text" name="position" value="<?php echo $position ?>">
			</br>
			Prix
			<input id="prix" type="text" name="prix" value="<?php echo $prix ?>">
			</br>
			<input id="id" type="hidden" name="id" value="<?php echo $idproduit ?>">

<input  class="btn btn-warning" type=submit value=Modifier>
<input class="btn btn-danger" type=reset value=Annuler>
</form>
</html>
