<?php
$info = new ProduitDB($cnx);
$listeProduit = $info->getProduitE();
$nbrProduit = count($listeProduit);
//var_dump($listeProduit);
?>


<?php
for ($i = 0; $i < $nbrProduit; $i++) {
  ?>

</br></br>
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
    <th scope="row"><img src="./images/<?php print $listeProduit[$i]['image'] ?>" alt="Produit"/></th>
    <td>  <?php
    print utf8_decode($listeProduit[$i]['nom']);
    ?></td>
    <td> <?php
    print utf8_decode($listeProduit[$i]['prix']);
    ?>€</td>
    <td>  <?php
    if (isset($_SESSION['id'])) {
      ?>
      <a href="index.php?page=commande&id=<?php print $listeProduit[$i]['id_prod']; ?>">
        <img src="./images/panier.png" alt="panier"/>
      </a>
      <?php
    } else {
      print " Vous devez être connecté pour commander";
    }
    ?></td>
  </tr>
</tbody>
</table>


<?php
}
?>
<a href='./pages/imprimer.php' target='_blank'>Imprimer la liste des produits</a>
</div> 