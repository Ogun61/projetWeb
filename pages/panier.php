<?php
if (isset($_SESSION['id'])) {
    $commande = new CommandeDB($cnx);
    //var_dump($commande);
    $commande_client = $commande->getCommandeClient($_SESSION['id']);
    //var_dump($_SESSION);
    //var_dump($commande_client);
}
if (!empty($commande_client)) {
    

if (isset($_GET['id_com'])) {
    $_SESSION['id_com'] = $_GET['id_com'];
}
if (isset($_GET['supprimer'])) {
    $commande = new CommandeDB($cnx);
    $commande->suppCommande($_GET['supprimer']);
    header( "Location: index.php?panier" );
    
        //var_dump($_SESSION);
    
}
?>

<?php

$total = 0;
$code = 0;
$str = '';
?>
</br></br>
<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">Produit</th>
            <th scope="col">Numéro de produit </th>
            <th scope="col">Nom du produit </th>
            <th scope="col">id client </th>
            <th scope="col">Prix</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody><?php
    for ($i = 0; $i < sizeof($commande_client); $i++) {
        ?>
        <tr>
            <th scope="row"><img src="./images/<?php print $commande_client[$i]['image'] ?>" alt="Produit"/></th>
            <th scope="row"><?php print $commande_client[$i]['id_prod'] ?></th>
            <th scope="row"><?php print $commande_client[$i]['nom'] ?></th>
            <td> <?php
            print utf8_decode($commande_client[0]['id_client']);
            ?></td>
            <td>  <?php
            print($commande_client[$i]['prix']);
            $total = $total + ($commande_client[$i]['prix']);
            ?>€</td>
            <td>  
               <a href="index.php?page=panier&supprimer=<?=$commande_client[$i]['id_com'];?>">
                <img src="./images/delete2.png" alt="supprimer"/>
            </a>
        </tr>
        <?php
    }
   
    ?>
</tbody>

</table>



<?php
 print '<center><b> Vous avez ' . $i . ' article(s) pour un montant total de : ' . $total . ' €</b></center>';
}
?>