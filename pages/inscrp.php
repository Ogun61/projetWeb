<?php
if (isset($_POST['commit'])) {
    $pseudo = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $code_postal = $_POST['code_postal'];
    $ville = htmlspecialchars($_POST['ville']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password_confirmation']);

    if (!empty($_POST['username']) AND ! empty($_POST['email']) AND ! empty($_POST['password']) AND ! empty($_POST['password_confirmation'])) {

        $pseudolength = strlen($pseudo);
        if ($pseudolength <= 255) {

            $reqmail = $cnx->prepare("SELECT * FROM client WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {

                if ($password == $password2) {

                    $insertmbr = $cnx->prepare("INSERT INTO client(pseudo, email, motdepasse, nom, prenom, adresse, code_postal, ville) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                    $insertmbr->execute(array($pseudo, $email, $password, $nom, $prenom, $adresse, $code_postal, $ville));
                    $erreur = "Votre compte a bien été créer <a href=\"index.php?page=seconnecter\">Me connecter</a>";
                } else {
                    $erreur = "Vots mots de passes ne correspondent pas";
                }
            } else {
                $erreur = "Adresse mail déjà utilisée !";
            }
        } else {
            $erreur = "Votre nom d'utilisateur ne doit pas dépasser 255 caractères";
        }
    } else {
        $erreur = "Tous les champs doivent etre completer";
    }
}
?>

<div class="box box-signini ">   

    <div class="box-content dark">
        <form class="form-signin" id="new_user" accept-charset="UTF-8" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
            <input name="utf8" type="hidden" />
            <div class="champs-insc">
                <input class="form-control1" placeholder="Nom d&#39;utilisateur" type="text" name="username" id="username" value="<?php if (isset($username)) {
    echo "$username";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Adresse Email" type="email" name="email" id="email" value="<?php if (isset($email)) {
    echo "$email";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Nom" type="text" name="nom" id="nom" value="<?php if (isset($nom)) {
    echo "$nom";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Prenom" type="text" name="prenom" id="prenom" value="<?php if (isset($prenom)) {
    echo "$prenom";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Adresse" type="text" name="adresse" id="adresse" value="<?php if (isset($adresse)) {
    echo "$adresse";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Code Postal" type="text" name="code_postal" id="code_postal" value="<?php if (isset($code_postal)) {
    echo "$code_postal";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Ville" type="text" name="ville" id="ville" value="<?php if (isset($ville)) {
    echo "$ville";
}
?>" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Mot de passe" type="password" name="password" id="password" />
            </div>
            <div class="champs-insc">
                <input class="form-control1" placeholder="Confirmer le mot de passe" type="password" name="password_confirmation" id="password_confirmation" />
            </div>
            <input type="submit" name="commit" value="S&#39;inscrire" class="btn btn-primary btn-block"/>

        </form>
<?php
if (isset($erreur)) {
    echo '<font color="red">' . $erreur . "</font>";
}
?>
    </div>
</div>