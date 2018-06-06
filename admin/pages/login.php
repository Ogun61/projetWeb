<?php
//unset($_SESSION['admin']);
if (isset($_POST['formconnexion'])) {
    $log = new AdminDB($cnx);
    $admin = $log->getAdmin($_POST['login'], $_POST['mdpconnect']);
    var_dump($admin);
    if(is_null($admin)){    
        $erreur="Donn&eacute;es incorrectes";
    }
    else {
        $_SESSION['admin'] = 1;
        $erreur = "Authentifié!";
        print "message : " . $erreur;
        header('Location: ./index.php?page=accueil_admin');
    } 
}
?>


<div class="box box-signin">
    <div class="box-content dark">
        <form action="index.php?page=login" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <div class="form-group user_login">
                <input class="form-control1" placeholder="Login" type="text" name="login" id="login" />
            </div>
            <div class="form-group user_password">
                <input class="form-control1" placeholder="Mot de passe" type="password" name="mdpconnect" id="user_password" />
            </div>
            <div class="form-group">
                <button name="formconnexion" type="submit" class="btn btn-primary btn-block">Connexion</button>
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









