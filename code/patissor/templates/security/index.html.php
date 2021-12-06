<?php
 include __DIR__ . '/../../templates/header.html.php';
?>
  <div class="container">
    <h1 class="mb-4">Veuillez vous connecter</h1>
    <hr>
    
    <form action="/login/check" method="POST"> <!-- Penser à noter la route (action) dans le router -->
      <div class="form-group">
        <label for="exampleInputEmail1">Votre email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre adresse email" name="email-login" /><br />
        <label for="exampleInputPassword1">Mot de Passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Votre mot de passe" name="password-login" /><br />
        <button type="submit" class="btn btn-info">S'identifier</button>
      </div>
    </form>

  </div>

<?php
include __DIR__ . '/../../templates/footer.html.php';
?>