<h6>Choisir votre categorie de produit:</h6>
<ul id="categories">
<?php
foreach( $lesCategories as $uneCategorie) 
{
	$idCategorie = $uneCategorie['ID_CATEGORIE'];
	$libCategorie = $uneCategorie['NOM_CATEGORIE'];
	?>
	<li>
		<a href=index.php?uc=voirProduits&categorie=<?php echo $idCategorie ?>&action=voirProduitsMembre><?php echo $libCategorie ?></a>
	</li>
<?php
}
?>

</br>
<h6>Voir vos commandes:</h6>
<a href=index.php?uc=inscrire&action=DemandePageRecapCommande>Mes Commandes</a>
</ul>