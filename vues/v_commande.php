
<div id="creationCommande">
<a href="index.php?uc=gererPanier&action=voirPanier" onclick="return confirm('Voulez-vous vraiment revenir au panier?');">
<img src="images/retour.png" TITLE="Revenir au panier" ></a>
       
<form method="POST" action="index.php?uc=gererPanier&action=confirmerCommande">
	   <TABLE class="table table-bordered">
	    <tr>
	  <th>Image</th>
	  <th>Marque</th>
	  <th>Description</th>
	  <th>Quantite Commande</th>
	  <th>Prix</th>
	  <tr>
<?php
$tab = array();
$i = 0;
foreach( $lesProduitsDuPanier as $unProduit) 
{
	$id = $unProduit['ID_PRODUIT'];
	$marque = $unProduit['MARQUE'];
	$description = $unProduit['DESCRIPTION'];
	$prix=$unProduit['PRIX'];
	$image = $unProduit['IMAGE'];
		//print_r($Produit);
		$Produit = $_REQUEST['quantiteCommander'];
		foreach($Produit as $cle=>$valeur)
		{
			if(in_array($id, $tab) == false && $j == $i)
		    {
				$prixUnPro=$valeur*$prix;
				$prixtotal=$prixtotal+$prixUnPro;
				?>
			   	
				<tr>
				<td><img src="<?php echo $image ?>" alt=image width=100	height=100></td>
				<td><?php echo $marque. "</br>";?></td>
				<td> <?php 	echo	$description."($prix Euros)";?></td>
				<td> <?php 	echo	$valeur;?></td>
				<td> <?php 	echo	$prixUnPro;?>€</td>
				
				<tr>
				<input type="hidden"  name="quantite[<?php echo $cle ?>]" value="<?php echo $valeur ?>" >
				<?php
				$tab[] = $id;
			}
			$j = $j + 1;
		}
		$i = $i + 1;
		$j = 0;
}
	  ?>
	 </TABLE>
	 	   <TABLE class="table table-bordered">
	    <tr>
	  <th>Total A Payer: <?php 	echo	$prixtotal;?> €</th>
	  <tr>
	  </TABLE>
	  	<p>
		<input type="hidden"  name="TotalAPaye" value="<?php echo $prixtotal ?>" >
		  <input  class="btn btn-success"  type="submit" value="Valider" name="valider" >
      </p>
</form>

</div>





