<?php
 include __DIR__ . '/../../templates/header.html.php';
?>

<div class="container">
    <h1 class="mb-4">Inscription</h1>
    <hr>

    <!-- Formulaire d'inscription de l'utilisateur -->
    <form action="/register/save" method="POST"> <!-- Penser à noter la route (action) dans le router -->
      <div class="form-group">
       
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre adresse email" name="user-email" /><br />  
        <input type="password" class="form-control" placeholder="Votre mot de passe" name="user-password" /><br />
        <input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="user-confirm-password" /><br />
        <input type="text" class="form-control" placeholder="Nom" name="user-lastname" /><br />
        <input type="text" class="form-control" placeholder="Prénom"name="user-firstname" /><br />
        <input type="text" class="form-control" placeholder="Numéro de rue" name="user-address-number"/><br />
        <input type="text" class="form-control" placeholder="Rue" name="user-address-street"/><br />
        <input type="text" class="form-control" placeholder="Code Postal" name="user-address-zipcode"/><br />
        <input type="text" class="form-control" placeholder="Ville" name="user-address-city"/><br />
        <button type="submit" class="btn btn-info">S'inscrire</button><br />
      </div>
    </form>

</div>

<?php
include __DIR__ . '/../../templates/footer.html.php';
?>