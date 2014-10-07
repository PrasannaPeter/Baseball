<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application lafleur
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class Pdobaseball
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=baseball';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdobaseball = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		Pdobaseball::$monPdo = new PDO(Pdobaseball::$serveur.';'.Pdobaseball::$bdd, Pdobaseball::$user, Pdobaseball::$mdp); 
			Pdobaseball::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		Pdobaseball::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdolafleur = PdoLafleur::getPdoLafleur();
 * @return l'unique objet de la classe PdoLafleur
 */
	public  static function getPdobaseball()
	{
		if(Pdobaseball::$monPdobaseball == null)
		{
			Pdobaseball::$monPdobaseball= new Pdobaseball();
		}
		return Pdobaseball::$monPdobaseball;  
	}
/**
 * Retourne toutes les catégories sous forme d'un tableau associatif
 *
 * @return le tableau associatif des catégories 
*/
	public function getLesCategories()
	{
		$req = "select * from categorie";
		$res = Pdobaseball::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

/**
 * Retourne sous forme d'un tableau associatif tous les produits de la
 * catégorie passée en argument
 * 
 * @param $idCategorie 
 * @return un tableau associatif  
*/

	public function getLesProduitsDeCategorie($idCategorie)
	{
	    $req="select * from produit where ID_CATEGORIE = '$idCategorie'";
		$res = Pdobaseball::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}
	
/**
 * Retourne les produits concernés par le tableau des idProduits passée en argument
 *
 * @param $desIdProduit tableau d'idProduits
 * @return un tableau associatif 
*/
	public function getLesProduitsDuTableau($desIdProduit)
	{
		$nbProduits = count($desIdProduit);
		$lesProduits=array();
		if($nbProduits != 0)
		{
			foreach($desIdProduit as $unIdProduit)
			{
				$req = "select * from produit where ID_PRODUIT = '$unIdProduit'";
				$res = Pdobaseball::$monPdo->query($req);
				$unProduit = $res->fetch();
				$lesProduits[] = $unProduit;
			}
		}
		return $lesProduits;
	}
	
	public function InsertionClient($login,$mdp,$mdp2,$nom,$prenom,$add,$ville,$cp,$tel,$mail)
	{
		$req = "insert into client values ('$login','$mdp','$mdp2','$nom','$prenom','$add','$ville','$cp','$tel','$mail')";
		$res = Pdobaseball::$monPdo->exec($req);
		$ok=true;
		$_SESSION['cli']=true;
		return $ok;
	
	}
	
	public function VerificationLogin($login,$mdp)
	{
		$req =" select ID_CLIENT  from client where LOGIN_CLIENT='$login' and MDP1_CLIENT='$mdp'";
		$res = Pdobaseball::$monPdo->query($req);
		$nb = $res->rowCount();

				
		if($nb > 0 )
		{
			$ok = true;
			$laLigne = $res->fetch();
			$_SESSION['cli']=$laLigne['ID_CLIENT'] ;
		}
		else
		{
			$ok = false;
		}
		return $ok;
	
	
	}
	
	public function VerificationAdmin($login,$mdp)
	{
		$req =" select count(ID_ADMIN) as nb from admin where LOGIN='$login' and MDP='$mdp'";
		
		$res = Pdobaseball::$monPdo->query($req);
		$laLigne = $res->fetch();
					
		if($laLigne['nb'] > 0)
		{
		$ok = true;
		$_SESSION['admin']=true;
		}
		else
		{
		$ok = false;
		}
		return $ok;
	
	
	}
	
	//supprimer produits
	public function SupprimerProduits($id)
	{ 	$req ="select count(*)  from correspondre where ID_PRODUIT='$id'";
		$res = Pdobaseball::$monPdo->query($req);
		$laLigne = $res->fetch();		
			if($laLigne[0] > 0)
			{
			$ok = false; 
			}
			else
			{
			$req2 =" delete from produit where ID_PRODUIT='$id'";
			$res2 = Pdobaseball::$monPdo->exec($req2);
			$ok = true;
			}
			return $ok;
		
	}
		

	
	public function getUnProduitsDuTableau($IdProduit)
	{
	$req = "select * from produit where ID_PRODUIT='$IdProduit'";
	$res = Pdobaseball::$monPdo->query($req);
	$unProduit = $res->fetch();
	$lesProduits[] = $unProduit;
	return $unProduit;
	}
//modification
	public function ModifierProduits($id,$Newprix,$NewMarque,$Newdescription,$NewPosition)
	{ 	
	$req = " UPDATE produit SET MARQUE='$NewMarque' ,DESCRIPTION='$Newdescription' , POSITION_JOUEUR='$NewPosition' , PRIX='$Newprix' WHERE ID_PRODUIT='$id'";
	$res = Pdobaseball::$monPdo->exec($req);
	$ok = true;
	return $ok;
	}

//ajout new produit
	public function AjouterProduits($id, $categorie, $marque, $description, $position, $prix, $image)
	{ 	
		$req="INSERT INTO produit values ('','$categorie', '$marque', '$description', '$position', '$prix', '$image')";
		$res = Pdobaseball::$monPdo->exec($req);
		$ok = true;
		return $ok;
	}

	// creation de commande
	public function creerCommande($idCli,$lesProduits,$today,$TotalAPaye)
	{   
		$req = "insert into commande values ('','$idCli','$today','$TotalAPaye')";
		$res = Pdobaseball::$monPdo->exec($req);
		
			$req = "select max(ID_COMMANDE) as maxi from commande";
			
			$res = Pdobaseball::$monPdo->query($req);
			$laLigne = $res->fetch();
			$idCommande= $laLigne['maxi'] ;
			
		foreach($lesProduits as $cle=>$valeur)
		{   
			
				$req = "insert into  correspondre values ('$cle','$idCommande',$valeur)";
		
				$res = Pdobaseball::$monPdo->exec($req);
		}
	}
	
	//recuperation de commande
		public function getCommandeClient($idclient)
	{
		$req = "select * from commande where ID_CLIENT  = '$idclient'";
		$res = Pdobaseball::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
}