<?php
require './lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<html>
    <head>
    <title>APSLL</title>
    <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-4.0.0/dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-4.0.0/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="./lib/css/style.css"/>
    <script language="javascript" src="./lib/js/jquery-3.3.1.js"></script>
    <script language="javascript" src="./lib/css/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <script language="javascript" src="./lib/js/jquery-3.3.1.js"></script>
    <script language="javascript" src="./lib/js/jquery-validation-1.17.0/dist/jquery.validate.js"></script>
    <script language="javascript" src="./lib/js/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    <script language="javascript" src="./lib/js/jquery-validation-1.17.0/dist/additional-methods.min.js"></script>
    <script language="javascript" src="./lib/js/fonctions.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <img src="" alt=""/>
            </header>
            <nav>
                <?php
                if (file_exists('./lib/php/a_menu.php')) {
                    include ('./lib/php/a_menu.php');
                }
                ?>
            </nav>
            <section id="main">
                <div class="container">
                    <?php
                    //si on n'est pas encore logué
                    if (!isset($_SESSION['admin'])) {
                        $_SESSION['page'] = "login";
                        print "<br/>pas connecté";
                    } else {
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = 'accueil_admin';
                        }
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                    }//fin else pas de session admin
                    $path = './pages/' . $_SESSION['page'] . '.php';
                    //print $path;
                    if (file_exists($path)) {
                        include ($path);
                    } else {
                        print "Oups...";
                    }
                    ?>
                </div>
            </section>
        </div>
        <div class="footer centrer clear">
        </div>

    </body>
</html>