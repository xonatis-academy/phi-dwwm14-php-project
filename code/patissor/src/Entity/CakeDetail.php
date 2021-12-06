<?php

// Attention : l'utilisation de ces attributs dans les controllers se fait sans la mention $
// Rappel : Ici $cake représente LE gâteau dans son ensemble (sans les détails d'attribut ex: nom, description etc...)

class CakeDetail  // Pas d'utilisation de l'ORM dans cette classe car les attributs ici ne serviront qu'à l'enregistrement des données dans les cookies de l'utilisateur
{
  public $cake;       // Cet attribut est représenté dans l'attribut $detailCakeQuantity de la classe Cart
  public $quantity;   // Cet attribut est également représenté dans l'attribut $detailCakeQuantity de la classe Cart
  public $totalPrice;
}