<html>
<form method=post action="index.php?uc=administrer&action=ajouter">

   <fieldset>
     <legend>Ajouter Produit</legend>
		
		
		<p>
			<label for="image">Image</label>
			 <input id="image" type="text" name="image" value="images/">
		</p>
		
		<label for="">Categorie</label>
			<select name=categorie size=3>
				<option value=1>Battes</option>
				<option value=2>Gants</option>
				<option value=3>Balles</option>
				<option value=4>Divers</option>
			</select> 
		</p>
		<p>
			<label for="marque">Marque</label>
			 <input id="marque" type="text" name="marque" value="reflex">
		</p>
		<p>
			<label for="">Description</label>
			 <input id="description" type="text" name="description" value="batte bois">
		</p>

		<p>
			<label for="">Prix</label>
			<input id="prix" type="text" name="prix" value="">
		<p>
	
		<p>
         <input class="btn btn-primary" type="submit" value="Valider" name="valider">
         <input class="btn btn-danger" type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
