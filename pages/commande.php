<?php
if (isset($_GET['id'])) {
    $_SESSION['id_prod'] = $_GET['id'];
}
if (isset($_SESSION['id_prod'])) {
    $produit = new ProduitDB($cnx);
    $prd = $produit->getProduitId($_SESSION['id_prod']);
}
if (isset($_GET['acheter'])) {
    $commande = new PanierDB($cnx);
    $commande->ajoutPanier(array("id_client" => $_SESSION['id'], "id_prod" => $_SESSION['id_prod']));
    
    
    ?>
    <script type="text/javascript">

        alert("Le produit a été ajouter au panier !");

    </script>
    //<meta http-equiv = "refresh": content = "1;url=index.php?page=produit">
    <?php

}
?>

<?php
if (isset($_SESSION['id_prod'])) {
    ?>

</br></br>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
    <table class="table table-hover table-dark">

        <thead>
            <tr>
               <th scope="col">&nbsp</th>
               <th scope="col">Nom du produit</th>
               <th scope="col">Prix</th>
               <th scope="col">&nbsp</th>
           </tr>
       </thead>
       <tbody>
        <tr>
            <th scope="row"><img src="./images/<?php print $prd[0]['image'] ?>" alt="Produit"/></th>
            <td>  <?php
            print utf8_decode($prd[0]['nom']);
            ?></td>
            <td> <?php
            print utf8_decode($prd[0]['prix']);
            ?>€</td>
            <td>  
                <input type="submit" button type="button" name="acheter" id="acheter" value="Ajouter au panier" class="btn btn-secondary">&nbsp;  

                <button type="button" value="Annuler" class="btn btn-secondary" onClick="javascript:document.location.href = 'index.php?page=produit'" /> Retour  </button>

            </td>

        </tr>




    </tbody>
</table>


<?php
}else{
    echo "Aucune commande, ajouter d'abord un produit au panier à partir de la page produit";
}
?>



