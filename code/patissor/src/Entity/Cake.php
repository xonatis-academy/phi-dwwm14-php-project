<?php

// Permet d'inclure une seule fois l'ORM lorsqu'il y a plusieurs entités dans un même fichier
include_once __DIR__ . '/../../vendor/SimpleOrm.class.php';

// Attention : l'utilisation de ces attributs dans les controllers se fera sans la mention $
// On créée ici la structure mémoire d'un gâteau. 
// La classe hérite de SimpleOrm

class Cake extends SimpleOrm
{
  // Définition des attributs qui serviront de paramètres dans la base de données
  public $id;
  public $name;
  public $description;
  public $price;
}