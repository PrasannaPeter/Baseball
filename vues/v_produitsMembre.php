<div id="produits">
<?php
	
foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit['ID_PRODUIT'];
	$marque = $unProduit['MARQUE'];
	$description = $unProduit['DESCRIPTION'];
	$position = $unProduit['POSITION_JOUEUR'];
	$prix=$unProduit['PRIX'];
	$image = $unProduit['IMAGE'];
	?>	
	<ul>
			<li><img src="<?php echo $image ?>" width="300" height="500"/></li>
			<li><?php echo $marque ?></li>
			<li><?php echo $description ?></li>
			<li><?php echo $position ?></li>
			 <li><?php echo " : ".$prix." Euros" ?>
			<li><a href=index.php?uc=voirProduits&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=ajouterAuPanier> 
			 <img src="images/mettrepanier.png" TITLE="Ajouter au panier" </li></a>
			
	</ul>
			
			
			
<?php			
}
?>
</div>