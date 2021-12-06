<?php
 include __DIR__ . '/../../templates/header.html.php';
?>

<div class="container">
    <h1 class="text-center text-info mb-4">Ajout de gâteaux</h1>
    <hr>
    <div class="form-group">
      <form action="/admin/cake/add" method="POST">
        <input type="text" class="form-control" placeholder="Nom du gâteau" name="cake-name" /><br />
        <textarea class="form-control" placeholder="Description..." name="cake-description" ></textarea><br />
        <input type="number" class="form-control" step="0.01" min="0" max="2000" placeholder="Prix du gâteau" name="cake-price" /><br />   
        <!-- step (Le pas/seuil à utiliser pour incrémenter la valeur), min (valeur minimale acceptée), max (valeur maximale acceptée) -->
        <button type="submit" class="btn btn-dark mt-3">Ajouter</button>
      </form>
    </div>

</div>

<?php
include __DIR__ . '/../../templates/footer.html.php';
?>