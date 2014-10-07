<img src="images/votrePanier.png" width="120" height="900"/>
<form method=post action=index.php?uc=gererPanier&action=passerCommande>
<?php

foreach( $lesProduitsDuPanier as $unProduit) 
{
	$id = $unProduit['ID_PRODUIT'];
	$marque = $unProduit['MARQUE'];
	$description = $unProduit['DESCRIPTION'];
	$prix=$unProduit['PRIX'];
	$image = $unProduit['IMAGE'];
	
	?>
	<p>
	<img src="<?php echo $image ?>" alt=image width=100	height=100 />
	<?php
		echo	$marque. "</br>";
		echo	$description."($prix Euros)";
	?>	

	
			<select name="quantiteCommander[<?php echo $id ?>]">
<option selected value='1'>1 </option>
<option value='2'>2 </option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>

	<a href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article?');">
	<img src="images/retirerpanier.png" TITLE="Retirer du panier" ></a>
	<?php
	
}
?>

<br>
<input class="btn btn-success" type=submit value=PasserCommande>
</form>