<?php

/* ----------------------------------------------------------
AFFICHAGE DE LA PAGE D'INSCRIPTION (FORMULAIRE D'INSCRIPTION)
------------------------------------------------------------- */
function index()
{
  // Permet d'afficher la navbar
  include __DIR__ . '/../../templates/navbar.html.php';
  
  // Inclut la page d'inscription afin d'exécuter la fonction index()
  include __DIR__ . '/../../templates/registration/index.html.php';
}

/* -------------------------------------------------------------
VERIFICATION DES DONNEES UTILISATEUR (AVANT ENVOI DU FORMULAIRE)
---------------------------------------------------------------- */
function checkFields(): ?string
{
  // L'utilisation du OU logique || renvoie vrai si et seulement si au moins un des opérandes est vrai
  // Soit l'adresse email du POST est fausse, soit le champ email est vide
  if (isset($_POST['user-email']) === false || $_POST['user-email'] === '')
  {
    return 'Vous devez spécifier une adresse mail';
  }
  else if (isset($_POST['user-password']) === false || $_POST['user-password'] === '')
  {
    return 'Vous devez spécifier un mot de passe';
  }
  else if (isset($_POST['user-confirm-password']) === false || $_POST['user-confirm-password'] === '')
  {
    return 'Vous devez confirmer votre mot de passe';
  }
  else if ($_POST['user-password'] !== $_POST['user-confirm-password'])
  {
    return 'Votre confirmation doit être identique au mot de passe';
  }
  else 
  {
    return null;
  }
}

/* ---------------------------------------------------------
ENREGISTREMENT DES DONNEES UTILISATEUR (ENVOI DU FORMULAIRE)
------------------------------------------------------------ */
function save()
{
  $error = checkFields();       // Création de la variable pour récupérer une éventuelle erreur lors des vérifications
  session_start();              // Démarrage de la session
  $_SESSION['flash'] = $error;  // $_SESSION['flash'] permet de sauvegarder temporairement des infos sur le serveur et d'afficher un message éphémère
  if ($error !== null)          // Si la variable $error est strictement différente de null
  {
    header('LOCATION: /register'); // On redirige vers la page d'inscription
    die();        // Et on stoppe l'exécution du programme
  }

  // On définit les variables pour récupérer les données du POST (données entrées par l'utilisateur)
  $email = $_POST['user-email'];
  $password = $_POST['user-password'];
  $confirm = $_POST['user-confirm-password'];
  $lastname = $_POST['user-lastname'];
  $firstname = $_POST['user-firstname'];
  $number = $_POST['user-address-number'];
  $street = $_POST['user-address-street'];
  $zipcode = $_POST['user-address-zipcode'];
  $city = $_POST['user-address-city'];

    // Si le mot de passe saisi est strictement identique à la confirmation du mot de passe
    if ($password === $confirm)
    {
      // Alors on "copie" le modèle/entity User sur lequel on va se baser pour ...
      include __DIR__ . '/../Entity/User.php';

      // On va effectuer une vérification par rapport à l'adresse email renseignée (pour éviter les doublons)
      $user = User::retrieveByField('email', $email, SimpleOrm::FETCH_ONE);
      if ($user !== null) // Si $user est strictement différent de null, cela signifie que l'adresse existe déjà
      {
        $_SESSION['flash'] = 'Cette adresse est déjà prise'; // Affichage du message flash pour informer l'utilisateur
        header('LOCATION: /register'); // Redirection vers la page d'inscription
        die();      // Et on stoppe l'exécution du programme
      }

      // ...créer un nouvel utilisateur
      $user = new User();

      // Dans chaque champ défini auparavant dans l'entité, on va attribuer une valeur
      // On dit qu'on "hydrate"/associe les paramètres/attributs (sans le $) avec les données qui seront envoyées par l'utilisateur (données du POST)
      // On ne renseigne pas l'id, car mysql va s'en charger avec l'auto-incrémentation dans la base de données (Voir PK Primary Key)
      $user->email = $email;
      $user->password = $password;
      $user->lastname = $lastname;
      $user->firstname = $firstname;
      $user->address_number = $number;
      $user->address_street = $street;
      $user->address_zipcode = $zipcode;
      $user->address_city = $city;

      // On enregistre la variable $user nouvellement "hydratée" de tous les paramètres
      $user->save();
    }
    else // Sinon (Dans le cas contraire ex : mot de passe non conforme, pas identique)
    {
      // On envoie un message pour informer l'utilisateur
      echo '<div>Votre mot de passe et la confirmation de ce dernier doivent être identiques</div>';
    }
}

