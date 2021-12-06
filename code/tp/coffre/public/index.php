<?php

// Variable superglobale de PHP : tableau contenant des informations utiles données par le serveur sur la session utilisateur
$path = $_SERVER['PATH_INFO'];

// Chemin vers la page d'ajout de données
if ($path === '/ajouter')
{
  include __DIR__ . '/../src/Controller/AddInformationController.php';
  index();
}
// Chemin (intermédiaire) de validation de la page d'ajout de données
else if ($path === '/ajouter/valider')
{
  include __DIR__ . '/../src/Controller/AddInformationController.php';
  validate();
}
// Chemin vers la page de récupération de données
else if ($path === '/verifier')
{
  include __DIR__ . '/../src/Controller/CheckInformationController.php';
  index();
}
// Chemin (intermédiaire) de validation de la page de récupération de données
else if ($path === '/verifier/valider')
{
  include __DIR__ . '/../src/Controller/CheckInformationController.php';
  validate();
}