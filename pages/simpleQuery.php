<?php

require '../lib/php/PgConnect.php';
$cnx = new PDO($dsn,$user,$pass);
//var_dump($cnx);

$query="select * from vue_produit_fournisseur_ville";
$resultset=$cnx->query($query);//pdo statement
foreach ($resultset as $data);
print "<br/>".$data['nom_produit'];