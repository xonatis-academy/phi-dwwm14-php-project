<?php

include __DIR__ . '/../../templates/navbar.html.php';

/* -------------------------------------------------------
SECTION ADMIN: AFFICHAGE DU FORMULAIRE D'AJOUT DE GATEAUX
---------------------------------------------------------- */
function index()
{
  include __DIR__ . '/../../templates/admin_cake/index.html.php';
}

/* ------------------------------------------
ENREGISTREMENT DES GATEAUX DANS LE CATALOGUE
--------------------------------------------- */
function save()
{
  $name = $_POST['cake-name'];
  $description = $_POST['cake-description'];
  $price = $_POST['cake-price'];

  // Rappel : La classe est une structure d'un espace mémoire, on peut aussi dire que c'est le plan d'un objet
  // On "copie" le modèle/entity Cake sur lequel on va se baser. Cela va permettre de structure un ensemble de données. 
   include __DIR__ . '/../Entity/Cake.php';

  // L'objet est une "instance" de la classe Cake (Ex: le résultat palpable d'un plan) 
  $quaique = new Cake();

  // On va associer les valeurs du payload (données saisies dans le POST) aux cases propriétés définies dans la classe (Réservation en mémoire)
  // Ex : On récupère la valeur de $name qui provient du payload (saisie de l'admin)
  // On affecte cette valeur à la case vide prévue "name" (sans le $) et cela constitue le contenu de l'objet
  $quaique->name = $name;
  $quaique->description = $description;
  $quaique->price = $price;

  // "save" ici est une fonction/méthode
  // L'objet "quaique" va s'enregistrer en base de données (grâce à l'ORM mentionné dans la classe)
  $quaique->save();

  // Ordre du back-end au front-end pour effectuer une redirection et changer de page
  header('LOCATION: /admin/cake');
}