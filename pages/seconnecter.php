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
            $_SESSION['email'] = $userinfo['email'];
            header("Location: index.php?page=accueil");
        } else {
            $erreur = "Mauvais mail ou mot de passe";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>


<div class="box box-signin">
    <div class="box-content dark">
        <form action="index.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <div class="form-group user_login">
                <input class="form-control1" placeholder="Email" type="text" name="mailconnect" id="user_login" />
            </div>
            <div class="form-group user_password">
                <input class="form-control1" placeholder="Mot de passe" type="password" name="mdpconnect" id="user_password" />
            </div>
            <div class="form-group">
                <button name="formconnexion" type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
            <div class="form-group text-center">
                <small><a href="./index.php?page=inscrp">S'inscrire?</a></small>
                
            </div>
            

        </form>
        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>";
        }
        ?>
    </div>
</div>
</div>









