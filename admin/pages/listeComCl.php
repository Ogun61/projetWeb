<?php
include('./lib/php/verifier_connexion.php');

$info = new ProduitDB($cnx);
$listeClient = $info->getProduitClient();

?>

<div class="container">
	<h2>Liste des produits acheté par les clients</h2>
	<p>Tapez quelque chose dans le champ de saisie pour rechercher les informations disponible dans la table</p>  
	<input class="form-control" id="mesChamps" type="text" placeholder="Search..">
	<br>
	<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Id commande</th>
				<th>Id client</th>
				<th>Id produit</th>
				<th>Nom produit</th>
				<th>Prix</th>
				
			</tr>
		</thead>
		<tbody id="tableClient">
			<?php
			for ($i = 0; $i < sizeof($listeClient); $i++) {
				?>
				<tr>
					
					<td scope="row"><?php print $listeClient[$i]['id_com'] ?></td>
					<td scope="row"><?php print $listeClient[$i]['id_client'] ?></td>
					<td scope="row"><?php print $listeClient[$i]['id_prod'] ?></td>
					<td scope="row"><?php print $listeClient[$i]['nom'] ?></td>
					<td scope="row"><?php print $listeClient[$i]['prix'].' €' ?></td>

					</tr>
					<?php
				}

				?>
			</tbody>
		</table>
	</div>
	</div>



