<div id="produits">
<a href=index.php?uc=administrer&&action=DemandePageAjout> 
			 <img src="images/insert.jpg" width="50" align="center"	height="50" TITLE="Ajouter un nouveau produit"></a>
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
			<li><img src="<?php echo $image ?>" alt=image width=300	height=150/></li>
			<li><?php echo $marque ?></li>
			<li><?php echo $description ?></li>
			<li><?php echo$position?></li>
			 <li><?php echo " : ".$prix." Euros" ?>
			<li><a href=index.php?uc=administrer&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=supprimer> 
			 <img src="images/delete.bmp" TITLE="Supprimer le produit" </li></a>
			 <li><a href=index.php?uc=administrer&categorie=<?php echo $categorie ?>&produit=<?php echo $id ?>&action=DemandePageModifier> 
			 <img src="images/Edit.bmp" TITLE="Modifier le produit" </li></a>
			
			
	</ul>
			
			
			
<?php			
}
?>
</div>
