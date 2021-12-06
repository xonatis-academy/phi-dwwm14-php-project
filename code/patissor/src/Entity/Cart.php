<?php

// Attention : l'utilisation de ces attributs dans les controllers se fait sans la mention $

class Cart  // Pas d'utilisation de l'ORM dans cette classe car les attributs ici ne serviront qu'à l'enregistrement des données dans les cookies de l'utilisateur
{
  public $detailCakeQuantity; // Cet attribut reprend les 2 premiers attributs de la classe CakeDetail (voir $cake et $quantity)
  public $totalPrice;
}