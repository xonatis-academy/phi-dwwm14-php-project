<?php

// Permet d'inclure l'ORM. Utiliser "include_once" pour l'ORM une seule fois lorsqu'il y a plusieurs entités dans un même fichier
include __DIR__ . '/../../vendor/SimpleOrm.class.php';

// On crée la structure mémoire d'un utilisateur. La classe hérite de l'ORM (SimpleOrm) 
class Information extends SimpleOrm
{
  // Définition des attributs/propriétés de la base de données
  public $id;
  public $email;
  public $content;
  public $key1;
  public $key2;
  public $key3;
}

/* Rappel : La mention "public" signifie que l'attribut est accessible de partout dans le projet
alors que "private" signifie qu'il est accessible uniquement dans la classe.
Attention : l'utilisation de ces attributs dans les controllers se fera sans la mention $ */ 