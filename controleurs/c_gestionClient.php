<?php 
$action = $_REQUEST['action'];
switch($action)
{
	case 'inscrire':
	{	
		$verifCoCli = estCoCli();
		if($verifCoCli = true)
		{
			
			include("vues/v_login.php");
			if($_SESSION['cli'] != "")
			{
				$lesCategories = $pdo->getLesCategories();
				include("vues/v_categoriesMembre.php");
			}
		}
		else
		{
			include("vues/v_login.php");
		}
	
		break;
	}
	
		
		
		
		case 'formulaire':
	{
			include("vues/v_inscription.php");
		break;
	}
		
		
		
		case 'verificationClient'	:
	{	
		$login =$_REQUEST['login'];
		$mdp =$_REQUEST['mdp'];
		$mdp2 =$_REQUEST['mdp2'];
		$nom =$_REQUEST['nom'];
		$prenom =$_REQUEST['prenom'];
		$add=$_REQUEST['add'];
		$ville =$_REQUEST['ville'];
		$cp=$_REQUEST['cp'];
		$mail=$_REQUEST['mail'];
		$tel=$_REQUEST['tel'];
	 	$msgErreurs = getErreursSaisieFormulaire($login,$mdp,$mdp2,$nom,$prenom,$add,$ville,$cp,$tel,$mail);
		
		if (count($msgErreurs)!=0)
		{  
			include ("vues/v_erreurs.php");
			include("vues/v_inscription.php");
		}
		else 
		{ 	
			$ok = $pdo->InsertionClient($login,$mdp,$mdp2,$nom,$prenom,$add,$ville,$cp,$tel,$mail);
					
					if ($ok)
					{
							$message = "Inscription valider";
							include("vues/v_message.php");
							include("vues/v_login.php");
					}
					else
					{
							$message="Erreur d'insertion de client,Reessayer";
							include ("vues/v_message.php");
							
					}
			
		}
	break;
	}

		
		case 'verificationLogin':
	{	
		$login =$_REQUEST['login'];
		$mdp =$_REQUEST['mdp'];

		$msgErreurs = getErreursSaisieLoginAdmin($login,$mdp);
		
		if (count($msgErreurs)!=0)
		{  
			include ("vues/v_erreurs.php");
			include("vues/v_login.php");
		}
			$ok = $pdo->VerificationLogin($login,$mdp);
					
					if ($ok)
					{		
							include("vues/v_deconnecter.php");
							$message="Bienvenue,Vous etes connecter";
							include ("vues/v_message.php");
							$lesCategories = $pdo->getLesCategories();
							include("vues/v_categoriesMembre.php");
					}
					else
					{
							$message="Erreur d'identification de l'utilisateur";
							include ("vues/v_message.php");
							include("vues/v_login.php");
					}
	break;
	}
	
	case 'deconnexion':
	{	
		deconnecter();
		$message="Vous etes deconnecter";
		supprimerPanier();
		include ("vues/v_message.php");
		include("vues/v_login.php");
	break;
	}
	
	case 'DemandePageRecapCommande':
	{	
		$idclient=$_SESSION['cli'];
		$lescommandes = $pdo->getCommandeClient($idclient);
		include("vues/v_recapCommande.php");
	break;
	}
	

}
?>


