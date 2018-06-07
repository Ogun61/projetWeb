<?php
if (isset($_SESSION['id'])) {
 $panier = new PanierDB($cnx);
    //var_dump($panier);
 $panier_client = $panier->getPanierClient($_SESSION['id']);
    //var_dump($_SESSION);
    //var_dump($panier_client);
}
if (!empty($panier_client)) {


    if (isset($_GET['id_pan'])) {
        $_SESSION['id_pan'] = $_GET['id_pan'];
    }
    if (isset($_GET['supprimer'])) {
        $panier = new PanierDB($cnx);
        $panier->suppPanier($_GET['supprimer']);
        header( "Location: index.php?panier" );

        //var_dump($_SESSION);

    }
    if (isset($_GET['validationpanier'])) {
        if (!isset($_GET['check11'])) {
           $commande = new CommandeDB($cnx);
           $commande_client = $commande->AjoutCommande(array("id_client" => $_SESSION['id'], "id_prod" => $_SESSION['id_prod'], "adresse" => $_GET['adresse'], "cp" => $_GET['codepostal']));
           $panier_client = $panier->viderPanier($_SESSION['id']);
           ?>
           <script type="text/javascript">

           alert("Commande effectué !");
           
           </script>

           <?php
           print "<meta http-equiv=\"refresh\": Content=\"0;URL=./index.php?page=accueil\">";
       }
       else{
        $panier_client = $panier->getPClient($_SESSION['id']);
        $commande = new CommandeDB($cnx);
        $commande_client = $commande->AjoutCommande(array("id_client" => $_SESSION['id'], "id_prod" => $_SESSION['id_prod'], "adresse" =>null , "cp" =>null ));
        $panier_client = $panier->viderPanier($_SESSION['id']);
        ?>
        <script type="text/javascript">

        alert("Commande effectué!");
        
        </script>
        <?php
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./index.php?page=accueil\">";
    }

}
?>

<?php

$total = 0;
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
    for ($i = 0; $i < sizeof($panier_client); $i++) {
        ?>
        <tr>
            <th scope="row"><img src="./images/<?php print $panier_client[$i]['image'] ?>" alt="Produit"/></th>
            <th scope="row"><?php print $panier_client[$i]['id_prod'] ?></th>
            <th scope="row"><?php print $panier_client[$i]['nom'] ?></th>
            <td> <?php
            print utf8_decode($panier_client[0]['id_client']);
            ?></td>
            <td>  <?php
            print($panier_client[$i]['prix']);
            $total = $total + ($panier_client[$i]['prix']);
            ?>€</td>
            <td>  
               <a href="index.php?page=panier&supprimer=<?=$panier_client[$i]['id_pan'];?>">
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

?>
<button type="button" class="btn btn-primary validpan" data-toggle="modal" data-target="#exampleModalCenter"">
    Valider mon panier
</button>
<?php
}else{
    print('Panier vide.');
}
?>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Panier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <ul>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0">Montant du panier</h6>
                <small class="text-muted"></small>
            </div>

        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (€)</span>
            <strong><?php print $total . '€' ?></strong>
        </li>
    </ul>

</div>
<form id="validationpanier" method="get">

    <div id="formcom">
        <h7>Adresse de livraison</h7>

        <div class="form-check">
            <input type="checkbox" name="check11" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Livrer à l'adresse par défaut</label>
        </div>
        <div id="checkverif">
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Adresse</span>
            </div>
            <div class="col-xs-2">
              <input type="text" name="adresse" class="form-control specx" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
          </div>
      </div>
      <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Code Postal</span>
        </div>
        <div class="col-xs-2">
          <input type="text" class="form-control" name="codepostal" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
  </div>
</div>
</div>

<div class="modal-footer">

    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
    <button type="submit" value="validationpanier" name="validationpanier" class="btn btn-secondary mod">Commander</button>

</div>
</form>
</div>
</div>

</div>
