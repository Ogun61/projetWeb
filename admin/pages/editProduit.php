<?php
include('./lib/php/verifier_connexion.php');

$info = new ProduitDB($cnx);
$listeClient = $info->getProduit();

?>

<div class="container">
	<h2>Liste Produit</h2>
	<p>Tapez quelque chose dans le champ de saisie pour rechercher les informations disponible dans la table</p>  
	<input class="form-control" id="mesChamps" type="text" placeholder="Search..">
	<br>
	<table class="table table-bordered table-striped" id="mytable">
		<thead>
			<tr>
				<th>Id produit</th>
				<th>Nom du produit</th>
				<th>Prix</th>
			</tr>
		</thead>
		<tbody id="tableClient">
			<?php
			for ($i = 0; $i < sizeof($listeClient); $i++) {
				?>
				<tr>
					<td scope="row" fulltable-field-name="id_prod"><?php print $listeClient[$i]['id_prod'] ?></td>
					<td scope="row" fulltable-field-name="nom"><?php print $listeClient[$i]['nom'] ?></td>
					<td scope="row" fulltable-field-name="prix"><?php print $listeClient[$i]['prix'].' €' ?></td>
				</tr>
				<?php
			}

			?>
		</tbody>
	</table>
</div>



