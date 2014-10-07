<?php
$action = $_REQUEST['action'];

switch($action)
{
		case 'administrateur':
		{
			$verifCoAdm = estCoAdm();
			if($verifCoAdm = true)
			{
				$message="Administateur";
				include ("vues/v_message.php");
				include("vues/v_admin.php");
				if($_SESSION['admin'] != "")
				{
				$lesCategories = $pdo->getLesCategories();
				include("vues/v_categories_admin.php");
				}
			}
			else
			{
				include("vues/v_admin.php");
			}
		break;
		}
		
		
		case 'deconnexion':
	{	
		deconnecter_admin();
		$message="Vous etes deconnecter";
		include ("vues/v_message.php");
		include("vues/v_admin.php");
		break;
	}
		
		
		case 'verificationAdministrateur':
		{	
				
				$login =$_REQUEST['login'];
				$mdp=$_REQUEST['mdp'];
				
				$msgErreurs = getErreursSaisieLoginAdmin($login,$mdp);
		
				if (count($msgErreurs)!=0)
				{  
				include ("vues/v_erreurs.php");
				include("vues/v_admin.php");
				}
				else
				{
					$ok = $pdo->VerificationAdmin($login,$mdp);
					
					if ($ok)
					{		
							$message="Bienvenue:Partie Administateur";
							include ("vues/v_message.php");
							
							$lesCategories = $pdo->getLesCategories();
							include("vues/v_categories_admin.php");
					}
					else
					{
					
							$message="Erreur d'identification de l'administrateur";
							include ("vues/v_message.php");
							include("vues/v_admin.php");
						
					}
				}
		break;
		}		
		
		
		
		case 'voirProduits' :
		{
			$message="Administrateur";
			include ("vues/v_message.php");
			include("vues/v_deconnecter_admin.php");
			$lesCategories = $pdo->getLesCategories();
			include("vues/v_categories_admin.php");
			$categorie = $_REQUEST['categorie'];
			$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
			include("vues/v_produits_admin.php");
			break;
		}
		
		
		case 'supprimer' :
		{
			
			$id = $_REQUEST['produit'];
			$ok = $pdo->SupprimerProduits($id);
			if ($ok)
			{
				$message="Votre produit a ete supprimer";
				
				$lesCategories = $pdo->getLesCategories();
				include("vues/v_categories_admin.php");
				$categorie = $_REQUEST['categorie'];
				$lesProduits = $pdo->getLesProduitsDeCategorie($categorie);
				include("vues/v_produits_admin.php");
			}
			else
			{
				$message="Erreur de suppression de produit";
				include ("vues/v_message.php");
								
				}
			break;	
		}
		
		
		case 'DemandePageModifier' :
		{
			include ("vues/v_modification.php");
			break;
		}
		
		
		case 'modifier' :
		{
		$id = $_REQUEST['id'];
		$Newprix =$_REQUEST['prix'];
		$NewMarque=$_REQUEST['marque'];
		$Newdescription=$_REQUEST['description'];
		$NewPosition=$_REQUEST['position'];
		
		$ok = $pdo->ModifierProduits($id,$Newprix,$NewMarque,$Newdescription,$NewPosition);
			if ($ok)
			{
			$message="Votre produit a ete modifier";
			include ("vues/v_message.php");
			$lesCategories = $pdo->getLesCategories();
			include("vues/v_categories_admin.php");
			}
			else
			{
			$message="Erreur de modification de produit";
			include ("vues/v_message.php");
			$lesCategories = $pdo->getLesCategories();
			include("vues/v_categories_admin.php");
			}
		break;
		}
		
		
		case 'DemandePageAjout' :
		{
			include ("vues/v_ajoutProduit.php");
			break;
		}
		
		case 'ajouter':
		{	
			$id = $_REQUEST['id'];
			$categorie =$_REQUEST['categorie'];
			$marque=$_REQUEST['marque'];
			$description=$_REQUEST['description'];
			$position="test";
			$prix=$_REQUEST['prix'];
			$image=$_REQUEST['image'];
			$ok = $pdo->AjouterProduits($id, $categorie, $marque, $description, $position, $prix, $image);
			if ($ok)
			{
			$message="Votre produit a ete ajouter";
			include ("vues/v_message.php");
			$lesCategories = $pdo->getLesCategories();
			include("vues/v_categories_admin.php");
			}
			else
			{
			$message="Erreur d'ajout de produit";
			include ("vues/v_message.php");
			$lesCategories = $pdo->getLesCategories();
			include("vues/v_categories_admin.php");
			}
		
			break;
		}
}
?>







