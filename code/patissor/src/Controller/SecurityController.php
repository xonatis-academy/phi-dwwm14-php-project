<?php

/* ------------------------------------
AFFICHAGE DE LA PAGE DE CONNEXION/LOGIN
--------------------------------------- */
function index()
{
  include __DIR__ . '/../../templates/navbar.html.php';
  include __DIR__ . '/../../templates/security/index.html.php';
}

/* ---------------------------------------------------
VERIFICATION DE LA SAISIE UTILISATEUR (CONNEXION/LOGIN)
------------------------------------------------------- */
function check()
{
  // On a défini les variables pour récupérer les données du POST (saisie de l'utilisateur)
  $login = $_POST['email-login'];
  $password = $_POST['password-login'];

  // On copie le modèle User sur lequel on va se baser pour effectuer la vérification des champs
  include __DIR__ . '/../Entity/User.php';

  // On récupère en base de données, l'utilisateur qui est propriétaire de l'adresse email saisie
  // retrieveByField est une fonction de la classe User (qui elle-même hérite de SimpleOrm)
  // retrieveByField équivaut à un SELECT * FROM user WHERE email = $login 
  // Les paramètres sont "email" (string), $login (string) et la constante FETCH_ONE de SimpleOrm sert à récupérer 1 seul utilisateur (équivaut à un "limit 1)
  $user = User::retrieveByField('email', $login, SimpleOrm::FETCH_ONE);

  // Si le contenu de la variable ne renvoie rien, cela signifie que l'utilisateur n'existe pas
  if ($user === null)
  {
    // On affiche un message pour préciser que l'utilisateur n'existe pas
    echo '<div>L\'utilisateur n\'existe pas</div>';
    die();
  }

  // On récupère le password envoyé dans le payload par l'utilisateur et on le compare au password enregistré en base de données
  // Si le mot de passe saisi est strictement différent du mot de passe enregistré en base de données...
  if ($user->password !== $password)
  {
    // On affiche un message pour en informer le visiteur
    echo '<div>Le mot de passe est incorrect</div>';
    die();
  }

  // Et si tout s'est bien passé lors des contrôles, on démarre une nouvelle session pour l'utilisateur
   session_start();
  // session_start est une fonction de démarrage de session ET qui permet d'affecter l'utilisateur à la variable $_SESSION
  // A noter que $_SESSION dure 180 minutes par défaut
  $_SESSION['current-user'] = $user;

  // On demande au back-end d'ordonner au front-end d'effectuer une redirection
  // Cette fonction signifie littéralement que le back-end donne un ordre au front-end en précisant que la nouvelle "location" (emplacement) est la page catalog
  header('LOCATION: /catalog');
}

function logout()
{
  // Pour "détruire"/supprimer la session, il faut lancer d'abord un démarrage de session puis enchaîner avec la destruction même
  session_start();
  session_destroy();

  // On effectue une redirection vers la page de connexion (login)
  header('LOCATION: /login');
}