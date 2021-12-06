<?php
  include __DIR__ . '/../Entity/Cart.php';

/* -----------------
AFFICHAGE DU PANIER
-------------------- */
function index()
{
  // S'il y a un panier existant (défini, déclaré et différent de null) dans les cookies
  if (isset($_COOKIE['cart']))
  {
    // Récupérer le panier existant
    $texte = $_COOKIE['cart'];

    // On effectue un décodage (désérialisation)
    $cart = json_decode($texte);
  }
  // Sinon...
  else 
  {
    // ...On crée un nouveau panier
    $cart = new Cart();
    $cart->detailCakeQuantity = [];
    $cart->totalPrice = 0;
  }

  // Il faut inclure la ou les vues APRES avoir finalisé les instructions
  include __DIR__ . '/../../templates/navbar.html.php';
  include __DIR__ . '/../../templates/cart/index.html.php';
}

/* -----------------------------
AJOUT D'ARTICLES DANS LE PANIER 
-------------------------------*/
function add()
{
  // On déclare une variable pour identifier l'article à ajouter au panier (par l'utilisateur)
  $cakeId = $_POST['cake-cart-id'];

  // On va récupérer le modèle (entité)
  include __DIR__ . '/../Entity/CakeDetail.php';

    // S'il y a un panier existant (défini, déclaré et différent de null) dans les cookies
    if (isset($_COOKIE['cart']))
    {
      // Récupérer le panier existant des cookies
      $texte = $_COOKIE['cart'];

      // On effectue un décodage (désérialisation)
      $cart = json_decode($texte);
    }
    // Sinon
    else
    {
      // ...On crée un nouveau panier
      $cart = new Cart();
      $cart->detailCakeQuantity = [];
      $cart->totalPrice = 0;
    }

    // Pour chaque produit du détail du panier ...
    foreach ($cart->detailCakeQuantity as $element)
    {
      // Si le produit actuel est le produit à ajouter...(On fait une comparaison)
      if ($element->cake->id === $cakeId)
      {
        // On incrémente la quantité de ce produit actuel (Il ne faut pas ajouter une nouvelle ligne mais juste changer sa quantité)
        $element->quantity = $element->quantity +1;

        // Mise à jour du prix total du produit actuel (sous-total)
        $element->totalPrice = $element->cake->price * $element->quantity;

        // Mise à jour du prix total du panier même
        $cart->totalPrice = $cart->totalPrice + $element->totalPrice;

        // On enregistre le panier (sous format texte afin de pouvoir l'enregistrer dans les cookies)
        $texte = json_encode($cart);
          // Pour cela, on effectue un encodage (sérialisation)
        setcookie('cart', $texte);

        // Ordre du back-end au front-end pour effectuer une redirection et changer de page
        header('LOCATION: /catalog');

        // On termine l'opération (on met fin à la fonction après l'enregistrement du panier)
        return; 
      }
    }

    // Création d'un nouveau détail dans le panier pour un autre produit du catalogue (qui ne se trouvait pas déjà dans le panier)
    // On définira ce nouveau produit avec une quantité de départ de 1 
    $detail = new CakeDetail();

    // On copie un autre modèle dont on a besoin
    include __DIR__ . '/../Entity/Cake.php';

    // Equivaut à une requête SELECT * FROM cake WHERE id etc...
    $detail->cake = Cake::retrieveByPK($cakeId);

    //On définit la quantité de départ à 1 (pour ce nouveau produit)
    $detail->quantity = 1;

    // On "hydrate" le prix total (basé sur le prix initial du produit)
    $detail->totalPrice = $detail->cake->price;

    // On va constituer un tableau avec le détail du panier + le nouveau détail qui vient s'ajouter au premier paramètre
    array_push($cart->detailCakeQuantity, $detail);

    // On met à jour le prix total du panier
    $cart->totalPrice = $cart->totalPrice + $detail->cake->price;

    // On enregistre le panier (sous format texte afin de pouvoir l'enregistrer dans les cookies)
    $texte = json_encode($cart);
      // Pour cela, on effectue un encodage (sérialisation)
    setcookie('cart', $texte);

    // Ordre du back-end au front-end pour effectuer une redirection et changer de page
    header('LOCATION: /catalog');

    // On termine l'opération (en mettant fin à la fonction après l'enregistrement du panier)
    return;
}

/* -------------
VIDER LE PANIER 
----------------*/

function clear()
{ 
  setcookie('cart', null);
  header('LOCATION: /cart');
}

/* ------------------
VALIDATION DU PANIER 
---------------------*/

function validate()
{
  // On va décoder le panier qui se trouve dans les cookies (désérialisation)
  $texte = $_COOKIE['cart'];
  $cart = json_decode($texte);

  // On va "copier" les entités qui nous sont nécessaires
  include __DIR__ . '/../Entity/Purchase.php';
  include __DIR__ . '/../Entity/PurchaseDetail.php';
 
  // On va créer une nouvelle commande (nouvel objet de la classe Purchase)
  $order = new Purchase();
  // On "hydrate" les propriétés/attributs de nouvel objet
  $order->createdAt = date('Y-m-d H:m:s');
  // Génère des nombres entiers pseudo-aléatoire cryptographiquement sécurisé dans l'intervalle entre min (Valeur minimale) et max (Valeur maximale) inclus.
  $order->reference = random_int(10000, 99999); 
  $order->totalPrice = $cart->totalPrice;

  // On "copie" le modèle/entity Utilisateur
  include __DIR__ . '/../Entity/User.php';

  // On démarre la session
  session_start();

  // On récupère l'utilisateur (récupération de l'id de l'utilisateur actuellement connecté)
  $order->userId = $_SESSION['current-user']->id;

  // On enregistre la commande
  $order->save();

    // On va récupérer le détail du panier pour construire la commande
    foreach ($cart->detailCakeQuantity as $product)
    {
      $detail = new PurchaseDetail();
      $detail->purchaseId = $order->id;
      $detail->cakeId = $product->cake->id;
      $detail->quantity = $product->quantity;
      $detail->totalPrice = $product->totalPrice;
      $detail->save();
    }
    // Il faut inclure la vue APRES avoir finalisé les instructions
    include __DIR__ . '/../../templates/cart/validate.html.php';
}