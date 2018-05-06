<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    ini_set('display_errors',1);
    require './admin/lib/php/adm_liste_include.php';
    $cnx = Connexion::getInstance($dsn,$user,$pass);
    session_start();
?>
<html>
    <head>
        <title>APSLL</title>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.0.0/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.0.0/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style.css"/>
        <script language="javascript" src="admin/lib/js/jquery-3.3.1.js"></script>
        <script language="javascript" src="admin/lib/css/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
        <script language="javascript" src="admin/lib/js/jquery-3.3.1.js"></script>
        <script language="javascript" src="admin/lib/js/fonctions.js"></script>


        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Auto Pièce Service LL</h1>
            </header>
            <nav>
                <?php
                if(file_exists('./lib/php/p_menu.php')){
                    include ('./lib/php/p_menu.php');
                }
                ?>
            </nav>
            <section id="main">
                <div class="container">
                    <?php
                        if (!isset($_SESSION['page'])){
                            $_SESSION['page']="accueil";
                        }
                        if (isset($_GET['page'])){
                            $_SESSION['page']=$_GET['page'];
                        }
                        $path='./pages/'.$_SESSION['page'].'.php';
                        if(file_exists($path)){
                            include ($path);
                        }
                        else {
                            print"Oups...";
                        }
                    ?>

                </div>
            </section>
        </div>
        <div class="footer centrer clear">
            

        </div>
    </body>
</html>
