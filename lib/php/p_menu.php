
<?php
if (isset($_POST['formconnexion'])) {

	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if (!empty($mailconnect) AND ! empty($mdpconnect)) {
		$requser = $cnx->prepare("SELECT * FROM client WHERE email = ? AND motdepasse = ?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if ($userexist == 1) {
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['nom'] = $userinfo['nom'];
			$_SESSION['email'] = $userinfo['email'];
			header('Location: index.php?page=accueil');

		} else {
			$erreur = "Mauvais mail ou mot de passe";
		}
	} else {
		$erreur = "Tous les champs doivent être complétés !";
	}
}
?>

<?php 
if (isset($_POST['formdeconnexion'])){

	header('Location: index.php?page=accueil');
}


?>



<?php
if (isset($_SESSION['id'])) {
	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
		<div class="container">
			<a class="navbar-brand" href="index.php?page=accueil">APSLL</a>
			<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
				&#9776;
			</button>
			<div class="collapse navbar-collapse" id="exCollapsingNavbar">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a href="index.php?page=accueil" class="nav-link">Accueil</a></li>
					<li class="nav-item"><a href="index.php?page=produit" class="nav-link">Produit</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Commander</a></li>
					<li class="nav-item"><a href="index.php?page=contact" class="nav-link">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
					<li class="dropdown order-1">
						<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Logout <span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right mt-2">
							<li class="px-3 py-2">
								<form action="index.php?page=deconnexion" method="post">
									<div class="form-group">
										<h4><?php echo "Bonjour ".ucfirst($_SESSION['nom']); ?></h4>
										<button name="formdeconnexion" type="submit" class="btn btn-primary btn-block">Déconnexion</button>
									</div>
								</form>

							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<?php } else {
	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
		<div class="container">
			<a class="navbar-brand" href="index.php?page=accueil">APSLL</a>
			<button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
				&#9776;
			</button>
			<div class="collapse navbar-collapse" id="exCollapsingNavbar">
				<ul class="nav navbar-nav">
					<li class="nav-item"><a href="index.php?page=accueil" class="nav-link">Accueil</a></li>
					<li class="nav-item"><a href="index.php?page=produit" class="nav-link">Produit</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Commander</a></li>
					<li class="nav-item"><a href="index.php?page=contact" class="nav-link">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
					<li class="dropdown order-1">
						<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right mt-2">
							<li class="px-3 py-2">
								<form class="form" role="form" action="index.php?page=accueil" method="post">
									<div class="form-group user_login">
										<input id="user_login" placeholder="Email" class="form-control form-control-sm" type="text" name="mailconnect">
									</div>
									<div class="form-group user_password">
										<input id="user_password" placeholder="Mot de passe" class="form-control form-control-sm" type="password" name="mdpconnect">
									</div>
									<div class="form-group">
										<button name="formconnexion" type="submit" class="btn btn-primary btn-block">Connexion</button>
									</div>
									<div class="form-group text-center">
										<small><a href="./index.php?page=inscrp">S'inscrire?</a></small>
									</div>
									<?php
									if (isset($erreur)) {
										echo '<font color="red">' . $erreur . "</font>";
									}
									?>
								</form>

							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

<?php } ?>





