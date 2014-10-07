<h6>Voici votre liste de commandes:</h6>
<TABLE class="table table-bordered">
	<tr>
	  <th>Date</th>
	  <th>Prix de la commande(en euros)</th>
	 <tr>
<?php
foreach( $lescommandes as $unecommande) 
{
	$date = $unecommande['DATE_COMMANDE'];
	$prix = $unecommande['TOTALAPAYE'];
?>
	<tr>
	  <th><?php 	echo	$date;?></th>
	  <th><?php 	echo	$prix;?></th>
	 <tr>		
	
<?php 
	$prixtotal =	$prix+$prixtotal;
}
?>
</TABLE>
	 	   <TABLE class="table table-bordered">
	    <tr>
	  <th>Total de commande(en euros): <?php 	echo	$prixtotal;?> </th>
	  <tr>
	  </TABLE>
