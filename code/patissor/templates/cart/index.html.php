<?php
 include __DIR__ . '/../../templates/header.html.php';
?>
  <div class="container">

    <h1 class="text-center text-info mb-4">Panier</h1>
    <hr>
        <table class="table">
        <tr>
          <th class="text-secondary"><strong>Nom</strong></th>
          <th class="text-secondary"><strong>Description</strong></th>
          <th class="text-secondary"><strong>Prix unitaire</strong></th>
          <th class="text-secondary"><strong>Quantité</strong></th>
          <th class="text-secondary"><strong>Prix total</strong></th>
        </tr>

        <!-- On va afficher le panier sous forme de tableau -->
        <?php
        // Pour chaque produit du détail du panier ...
        foreach ($cart->detailCakeQuantity as $element)
        {
          ?>
            <tr>
              <!-- On associe ou "hydrate" les paramètres/attributs (sans le $) avec les données récupérées de la base de données -->
              <td class="text-info font-weight-bold"><?= $element->cake->name ?></td>
              <td><?= $element->cake->description ?></td>
              <td><?= $element->cake->price ?></td>
              <td><?= $element->quantity ?></td>
              <td class="font-weight-bold"><?= $element->totalPrice ?></td>
            </tr>
          
          <?php
        }
        ?>
      </table>
<hr>
<div>
<strong>Total du Panier : <?= $cart->totalPrice ?> euros </strong>
</div>
<br />

<span>Cliquer<a href="/cart/clear"><strong> ici </strong></a>pour vider votre panier</span>
<br /><br />
<a href="/cart/validate">Valider le panier</a>

</div> <!-- fin div container -->

<?php
include __DIR__ . '/../../templates/footer.html.php';
?>
