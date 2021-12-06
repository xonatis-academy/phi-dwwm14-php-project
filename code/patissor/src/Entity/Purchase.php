<?php

// Permet d'inclure une seule fois l'ORM lorsqu'il y a plusieurs entités dans un même fichier
include_once __DIR__ . '/../../vendor/SimpleOrm.class.php';

class Purchase extends SimpleOrm
{
  public $id;           // Devient PurchaseId dans la classe PurchaseDetail
  public $createdAt;
  public $reference;
  public $totalPrice;
  public $userId;
}