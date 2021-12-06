<?php

/* --------------------------------------------
AFFICHAGE DE LA PAGE DE VERIFICATION DE DONNEES
----------------------------------------------- */
function index()
{
  include __DIR__ . '/../../templates/check_information/index.html.php';
}

/* -------------------------------------------------------------
VERIFICATION DES DONNEES SAISIES POUR LA RECUPERATION DE DONNEES
---------------------------------------------------------------- */

function validate()
{
  // Ici on prépare le contenu du payload (données qui seront envoyées vers le back-end)
  $email = $_POST['check-email'];
  $key1 = $_POST['check-key1'];
  $key2 = $_POST['check-key2'];
  $key3 = $_POST['check-key3'];

  /* On utilise "ou copie" le modèle (entité ou classe)
  On se basera sur ce modèle pour récupérer des données (via l'ORM) */
  include __DIR__ . '/../Entity/Information.php';
  $search = Information::retrieveByField('email', $email, SimpleOrm::FETCH_ONE);

  // Avec la variable ci-dessus, on met en place des conditions pour effectuer une vérification complète
  if ($search === null)      // Si la recherche ne retourne pas d'email 
  {
    echo '<h1>Email incorrect !</h1>';
    die();
  }
  else if ($search->key1 !== $key1) // Si la clé 1 saisie est diiférente de celle enregistrée en base de données
  {
    echo '<h1>La clé 1 est incorrecte !</h1>';
    die();
  }
  else if ($search->key2 !== $key2) // Si la clé 2 saisie est diiférente de celle enregistrée en base de données
  {
    echo '<h1>La clé 2 est incorrecte !</h1>';
    die();
  }
  else if ($search->key3 !== $key3) // Si la clé 3 saisie est diiférente de celle enregistrée en base de données
  {
    echo '<h1>La clé 3 est incorrecte !</h1>';
    die();
  }
  else 
  {
  /* On récupére le contenu du coffre ($content qui est l'attribut de la classe Information)
    Ce contenu est lié à un email utilisateur (voir la variable $search qui récupère cet email)
    On concatène les deux pour afficher le contenu */
    echo '<h1>Voici le contenu de votre coffre : ' . $search->content . '</h1>';
    die();
  }
}