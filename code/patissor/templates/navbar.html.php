<?php
// session_status permet de connaître l'état de la session courante (doit être positionnée en début de page avant la navbar notamment)
// PHP_SESSION_NONE = valeur de retour (si les sessions sont activées, mais qu'aucune n'existe)
if (session_status() === PHP_SESSION_NONE) 
{
    session_start(); // On démarre la session
}
?>

<!-- Création de la navbar (à inclure au besoin dans les fichiers du dossier templates) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PatissOr</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/catalog">Catalogue</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/cart">Panier</a>
                </li>

                <li class="nav-item">
                <?php   
                    if (isset($_SESSION['current-user']) === false) 
                    {
                        ?>
                        <a class="nav-link" href="/login">Se connecter</a>   
                        <?php
                    }
                ?>    
                </li>

                <li class="nav-item">
                <?php   
                    if (isset($_SESSION['current-user']) === false) 
                    {
                        ?>
                        <a class="nav-link" href="/register">S'inscrire</a>   
                        <?php
                    }
                ?>    
                </li>

                <li class="nav-item">
                <?php   
                    if (isset($_SESSION['current-user']) === true) 
                    {
                        ?>
                        <a class="nav-link" href="/logout">Déconnexion</a>   
                        <?php
                    }
                ?>    
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Récupération des éventuelles erreurs lors de la vérification au niveau du fichier "RegistrationController.php" -->
<?php
$erreur = '';
if (isset($_SESSION['flash']))      // On vérifie l'existence de flash dans $_SESSION
{   
    $erreur = $_SESSION['flash'];   // On déverse le contenu de flash qui est dans $_SESSION dans la variable $erreur
    $_SESSION['flash'] = '';        // On efface $_SESSION
}
?>

<!-- Affichage des erreurs (Message à l'attention de l'utilisateur) -->
<div>
    <?= $erreur ?>
</div>


