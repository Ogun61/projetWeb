<?php
include('./lib/php/verifier_connexion.php');

$info = new ClientDB($cnx);
$listeClient = $info->getAllClient();

?>

<div class="container">
	<h2>Liste Client</h2>
	<p>Tapez quelque chose dans le champ de saisie pour rechercher dans la table les prénoms, les noms de famille, les emails, les pseudos, les adresses, ou les villes :</p>  
	<input class="form-control" id="mesChamps" type="text" placeholder="Search..">
	<br>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Pseudo</th>
				<th>Email</th>
				<th>Adresse</th>
				<th>Code Postal</th>
				<th>Ville</th>
			</tr>
		</thead>
		<tbody id="tableClient">
			<?php
			for ($i = 0; $i < sizeof($listeClient); $i++) {
				?>
				<tr>
					<td scope="row"><?php print $listeClient[$i]['id'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['nom'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['prenom'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['pseudo'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['email'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['adresse'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['code_postal'] ?></th>
					<td scope="row"><?php print $listeClient[$i]['ville'] ?></th>	

					</tr>
					<?php
				}

				?>
			</tbody>
		</table>
	</div>


