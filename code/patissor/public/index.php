<?php

// La variable "Superglobale" $_SERVER est un tableau contenant des informations utiles données par le serveur sur la session utilisateur
// On peut y trouver l'adresse du script exécuté, l'adresse IP du client et du serveur, les headers etc...
// Pour afficher ces informations, il faut indiquer ce que l'on demande entre crochets [] puisque c'est un array.
$path = $_SERVER['PATH_INFO'];

// Chemin vers le catalogue
if ($path === '/catalog') 
{
  // Constante indiquant le répertoire du fichier courant (le dossier du fichier)
  include __DIR__ . '/../src/Controller/CatalogController.php';
  index();
}

// Chemin vers le panier (Affichage)
else if ($path === '/cart')
{
  include __DIR__ . '/../src/Controller/CartController.php';
  index();
}

// Chemin vers l'ajout de gâteaux dans le panier (Page intermédiaire)
else if ($path === '/cart/add')
{
  include __DIR__ . '/../src/Controller/CartController.php';
  add();
}

// Chemin pour vider le panier
else if ($path === '/cart/clear')
{
  include __DIR__ . '/../src/Controller/CartController.php';
  clear();
}

// Chemin pour valider le panier (Envoi vers le paiement)
else if ($path === '/cart/validate')
{
  include __DIR__ . '/../src/Controller/CartController.php';
  validate();
}

// Chemin vers l'affichage du formulaire de connexion utilisateur (Login)
else if ($path === '/login')
{
  include __DIR__ . '/../src/Controller/SecurityController.php';
  index();
}

// Chemin vers la vérification de connexion/login utilisateur (Page intermédiaire)
else if ($path === '/login/check')
{
  include __DIR__ . '/../src/Controller/SecurityController.php';
  check();
}

// Chemin vers la déconnexion de l'utilisateur (Fermeture de session)
else if ($path === '/logout')
{
  include __DIR__ . '/../src/Controller/SecurityController.php';
  logout();
}

// Chemin vers l'inscription utilisateur (Register)
else if ($path === '/register')
{
  include __DIR__ . '/../src/Controller/RegistrationController.php';
  index();
}

// Chemin vers l'enregistrement de l'inscription de l'utilisateur (Page intermédiaire)
else if ($path === '/register/save')
{
  include __DIR__ . '/../src/Controller/RegistrationController.php';
  save();
}

// Chemin vers la page Admin (Affichage de gâteaux)
else if ($path === '/admin/cake')
{
  include __DIR__ . '/../src/Controller/AdminCakeController.php';
  index();
}

// Chemin vers la page Admin d'ajout de gâteaux (Page intermédiaire)
else if ($path === '/admin/cake/add')
{
  include __DIR__ . '/../src/Controller/AdminCakeController.php';
  save();
}

// Chemin vers la page Not Found (Dernière option de notre condition "if")
else 
{
  include __DIR__ . '/../src/Controller/NotFoundController.php';
  index();
}