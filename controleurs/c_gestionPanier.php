<?php 
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':
	{
		$n= nbProduitsDuPanier();
		if($n >0)
		{
			$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
			include("vues/v_panier.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	}
	case 'supprimerUnProduit':
	{
		$idProduit=$_REQUEST['produit'];
		retirerDuPanier($idProduit);
		$desIdProduit = getLesIdProduitsDuPanier();
		$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
		include("vues/v_panier.php");
		break;
	}
	case 'passerCommande' :
	{
	    $n= nbProduitsDuPanier();
		if($n>0)
		{
		$desIdProduit = getLesIdProduitsDuPanier();
			$lesProduitsDuPanier = $pdo->getLesProduitsDuTableau($desIdProduit);
			
			$_SESSION['qte']= $_REQUEST['quantiteCommander'];
			$message = "verificaion de votre commande: Appuyer sur valider pour confimer.";
			include ("vues/v_message.php");
			include ("vues/v_commande.php");
		}
		else
		{
			$message = "panier vide !!";
			include ("vues/v_message.php");
		}
		break;
	}
	
	case 'confirmerCommande':
	{	
		$today = date("Ymd");
		$idCli=$_SESSION["cli"];
		$TotalAPaye=$_REQUEST['TotalAPaye'];
		$lesProduits = $_REQUEST['quantite'];
		$pdo->creerCommande($idCli,$lesProduits,$today,$TotalAPaye);
		$message = "Commande enregistrée";
		supprimerPanier();
		include ("vues/v_message.php");
		$lesCategories = $pdo->getLesCategories();
		include("vues/v_categoriesMembre.php");
	break;
	}
	


}


?>


