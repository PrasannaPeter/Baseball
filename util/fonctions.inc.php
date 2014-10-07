<?php
/**
 * Initialise le panier
 *
 * Crée une variable de type session dans le cas
 * où elle n'existe pas 
*/
function initPanier()
{
	if(!isset($_SESSION['produits']))
	{
		$_SESSION['produits']= array();
	}
}
/**
 * Supprime le panier
 *
 * Supprime la variable de type session 
 */
function supprimerPanier()
{
	unset($_SESSION['produits']);
}
/**
 * Ajoute un produit au panier
 *
 * Teste si l'identifiant du produit est déjà dans la variable session 
 * ajoute l'identifiant à la variable de type session dans le cas où
 * où l'identifiant du produit n'a pas été trouvé
 * @param $idProduit : identifiant de produit
 * @return vrai si le produit n'était pas dans la variable, faux sinon 
*/
function ajouterAuPanier($idProduit)
{
	
	$ok = true;
	if(in_array($idProduit,$_SESSION['produits']))
	{
		$ok = false;
	}
	else
	{
		$_SESSION['produits'][]= $idProduit;
	}
	return $ok;
}
/**
 * Retourne les produits du panier
 *
 * Retourne le tableau des identifiants de produit
 * @return : le tableau
*/
function getLesIdProduitsDuPanier()
{
	return $_SESSION['produits'];

}
/**
 * Retourne le nombre de produits du panier
 *
 * Teste si la variable de session existe
 * et retourne le nombre d'éléments de la variable session
 * @return : le nombre 
*/
function nbProduitsDuPanier()
{
	$n = 0;
	if(isset($_SESSION['produits']))
	{
	$n = count($_SESSION['produits']);
	}
	return $n;
}
/**
 * Retire un de produits du panier
 *
 * Recherche l'index de l'idProduit dans la variable session
 * et détruit la valeur à ce rang
 * @param $idProduit : identifiant de produit
 
*/
function retirerDuPanier($idProduit)
{
		$index =array_search($idProduit,$_SESSION['produits']);
		unset($_SESSION['produits'][$index]);
}
/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
*/

function getErreursSaisieFormulaire($login,$mdp,$mdp2,$nom,$prenom,$add,$ville,$cp,$tel,$mail)
{
	$lesErreurs = array();
	if($login=="")
	{
		$lesErreurs[]="Il faut saisir le champ login";
	}
	if($mdp=="")
	{
		$lesErreurs[]="Il faut saisir le champ mdp";
	}
	if($mdp2=="")
	{
		$lesErreurs[]="Il faut resaisir le mot de passe";
	}
	if($mdp!=$mdp2)
	{
		$lesErreurs[]="Il faut saisir le meme mot de passe";
	}
	if($nom=="")
	{
		$lesErreurs[]="Il faut saisir le champ nom";
	}
	if($prenom=="")
	{
		$lesErreurs[]="Il faut saisir le champ prenom";
	}
	if($add=="")
	{
		$lesErreurs[]="Il faut saisir le champ adresse";
	}
	if($ville=="")
	{
		$lesErreurs[]="Il faut saisir le champ ville";
	}
	if($cp=="")
	{
		$lesErreurs[]="Il faut saisir le champ Code postal";
	}
	if($mail=="")
	{
		$lesErreurs[]="Il faut saisir le champ mail";
	}
	if($tel=="")
	{
		$lesErreurs[]="Il faut saisir le champ telephone";
	}

	return $lesErreurs;
}

function getErreursSaisieLoginAdmin($login,$mdp)
{
	$lesErreurs = array();
	if($login=="")
	{
		$lesErreurs[]="Il faut saisir le champ Login";
	}
	if($mdp=="")
	{
		$lesErreurs[]="Il faut saisir le champ Mot de passe";
	}
	
	return $lesErreurs;
}


//verification de saisi des donnes de l admin
/*function getErreursVerifAdmin($login,$mdp)
{
	echo $login;
	echo $mdp;
	$lesErreurs = array();
	
	if (empty($login))
	{ 
		$lesErreurs[]="Il faut saisir le champ login";
	}
	if (empty($mdp))
	{
	$lesErreurs[]="Il faut saisir le champ mdp";
	}
}
*/


/**
 * Teste si un administrateur est connecté
 * @return vrai ou faux 
 */
function estCoCli()
{
  return isset($_SESSION['cli']);
}
/**
 * Teste si un administrateur est connecté
 * @return vrai ou faux 
 */
function estCoAdm()
{
  return isset($_SESSION['admin']);
}
/**
 * Détruit la session active
 */
function deconnecter()
{
	$_SESSION['cli'] = "";
}
function deconnecter_admin()
{
	$_SESSION['admin'] = "";
}


?>
