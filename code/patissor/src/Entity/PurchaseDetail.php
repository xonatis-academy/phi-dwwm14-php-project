<?php

// Permet d'inclure une seule fois l'ORM lorsqu'il y a plusieurs entités dans un même fichier
include_once __DIR__ . '/../../vendor/SimpleOrm.class.php';

class PurchaseDetail extends SimpleOrm
{
  public $id;
  public $purchaseId;     // Cet id est la primary key de la classe Purchase
  public $cakeId;
  public $quantity;
  public $totalPrice;
}