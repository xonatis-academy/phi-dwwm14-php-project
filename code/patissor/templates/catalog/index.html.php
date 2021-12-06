<?php
 include __DIR__ . '/../../templates/header.html.php';
?>

<main>

<div class="container">
    <h1 class="text-center text-info mb-4">Notre catalogue</h1>
    <hr>

  <?php
  // Pour chaque gâteau parcouru
  foreach ($allCakes as $cake)
  {
    ?>
    <!-- CODE HTML -->
    <!-- Afficher chaque gâteau avec les attributs définis dans la classe (modèle) -->
    <!-- $cake représente le gâteau dans son ensemble et les attributs permettent de le détailler pour l'affichage -->
    <div>
      <h2 class="text-secondary"><?= $cake->name ?></h2>
      <div><strong><?= $cake->description ?></strong></div>
      <div class="text-success"><strong><?= $cake->price ?></strong></div>
      <form action="/cart/add" method="POST">
        <input type="hidden" value="<?= $cake->id ?>" name="cake-cart-id" /> <!-- Permet de ne pas afficher l'input à l'écran -->
        <button type="submit" class="btn btn-dark mt-3">Ajouter au panier</button>
      </form>
    </div>

    <?php
  }
  ?>

  </div>
</main>

<?php
include __DIR__ . '/../../templates/footer.html.php';
?>