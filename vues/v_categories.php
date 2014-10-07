<h6>Choisir votre categorie de produit:</h6>
<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['ID_CATEGORIE'];
	$libCategorie = $uneCategorie['NOM_CATEGORIE'];
	?>
	<li>
		<a href=index.php?uc=voirProduits&categorie=<?php echo $idCategorie ?>&action=voirProduits><?php echo $libCategorie ?></a>
	</li>
<?php
}
?>
</ul>
