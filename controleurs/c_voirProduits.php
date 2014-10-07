<?php
initPanier();
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirCategories':
	{
  		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories.php");
  		break;
	}
	case 'voirProduits' :
	{
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_produits.php");
		break;
	}
	

	
	case 'voirProduitsMembre' :
	{
		$message = "Espace client";
		include("vues/v_message.php");
		include("vues/v_deconnecter.php"); 
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categoriesMembre.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_produitsMembre.php");
		break;
	}
	case 'ajouterAuPanier' :
	{	
		$idProduit=$_REQUEST['produit'];
		$categorie = $_REQUEST['categorie'];
		$ok = ajouterAuPanier($idProduit);
		if(!$ok)
		{
			$message = "Cet article est déjà dans le panier !!";
			include("vues/v_message.php");
		}
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categoriesMembre.php");
  		$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
		include("vues/v_produitsMembre.php");
		break;
	}
}
?>

