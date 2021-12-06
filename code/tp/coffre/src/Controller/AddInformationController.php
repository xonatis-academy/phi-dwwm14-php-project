<?php

/* -------------------------------------
AFFICHAGE DE LA PAGE D'AJOUT DE DONNEES
---------------------------------------- */
function index()
{
  include __DIR__ . '/../../templates/add_information/index.html.php';
}

/* ------------------------------
VERIFICATION DES DONNEES SAISIES
--------------------------------- */
function validate()
{
  // Ici on prépare le contenu du payload (données qui seront envoyées vers le back-end)
  $email = $_POST['info-email'];
  $data = $_POST['info-data'];
  $key1 = $_POST['info-key1'];
  $key2 = $_POST['info-key2'];

  // On utilise "ou copie" le modèle (entité ou classe) sur lequel on va se baser pour créer un nouvel objet
  include __DIR__ . '/../Entity/Information.php';

  // On créé un nouvel objet par rapport au modèle ci-dessus 
  $info = new Information();

  /* Dans chaque champ défini auparavant dans l'entité "Information", on va attribuer une valeur. On dit qu'on "hydrate"/associe 
  les paramètres/attributs (sans le signe $) avec les données qui seront envoyées par l'utilisateur (données du POST ou payload)
  On ne renseigne pas l'id, car mysql va s'en charger avec l'auto-incrémentation dans la base de données (Voir PK: Primary Key) */
  $info->email = $email;
  $info->content = $data;
  $info->key1 = $key1;
  $info->key2 = $key2;
  $info->key3 = random_int(100, 999);

  // On enregistre la variable $info nouvellement "hydratée" de tous les paramètres
  $info->save();

  // On envoie un message pour informer l'utilisateur
  echo '<h1>Votre 3ème clé est : <span style="color: blue">' .$info->key3.'</span></h1><br><h2>Veuillez la conserver précieusement.</h2>';
}