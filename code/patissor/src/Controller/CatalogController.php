<?php

/* --------------------
AFFICHAGE DU CATALOGUE
----------------------- */
function index()
{
  include __DIR__ . '/../../templates/navbar.html.php';
  
  // On "copie" l'entité "Cake" pour l'affichage des articles disponibles en base de données (grâce à l'ORM)
  include __DIR__ . '/../Entity/Cake.php';
  
  // Requête envoyée à SimpleOrm (pour qu'il effectue le transfert)
  $allCakes = Cake::all();

  include __DIR__ . '/../../templates/catalog/index.html.php';
}