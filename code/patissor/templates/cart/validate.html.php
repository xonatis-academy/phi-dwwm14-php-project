<?php
 include __DIR__ . '/../../templates/header.html.php';
?>

<div class="container">

    <h1 class="text-center text-info mb-4">Paiement de la commande</h1>
    <hr>
    
      <form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
        <!-- name="business" c'est parce que l'on doit créer un compte Business -->
        <!-- value="" représente l'email du marchand -->
        <input type="hidden" name="business" value="formation@xonatis.com">

        <!-- cmd & _xclick signifient une commande provenant d'un clic -->
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Libellé à afficher sur la page de paiement -->
        <input type="hidden" name="item_name" value="Achat de gâteaux">

        <!-- Montant à afficher sur la page de paiement -->
        <input type="hidden" name="currency_code" value="EUR">
        
        <!-- Paypal demande à afficher une image "Buy Now" -->
        <input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
    </form>
</div>

<?php
include __DIR__ . '/../../templates/footer.html.php';
?>