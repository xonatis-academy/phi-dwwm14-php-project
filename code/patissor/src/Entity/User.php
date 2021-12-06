<?php

// Permet d'inclure une seule fois l'ORM lorsqu'il y a plusieurs entités dans un même fichier
include_once __DIR__ . '/../../vendor/SimpleOrm.class.php';

// Attention : l'utilisation de ces attributs dans les controllers se fera sans la mention $
// On créée la structure mémoire d'un utilisateur. La classe hérite de l'ORM (SimpleOrm)

class User extends SimpleOrm
{
  // Définition des attributs de la base de données
  public $id;
  public $email;
  public $password;
  public $lastname;
  public $firstname;
  public $address_number;
  public $address_street;
  public $address_zipcode;
  public $address_city;
}