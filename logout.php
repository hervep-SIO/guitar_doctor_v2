<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Déconnexion</title>
  <link rel="stylesheet" href="./css/style-global.css">
  <meta http-equiv="refresh" content="10;url=index.html">
</head>
<body>

<nav>
    <a href="index.html">Accueil</a>
    <a href="produits.html">Produits</a>
    <a href="contact.html">Contact</a>
    <a href="societe.html">Société</a>
	<a href="inscription.html">Inscription</a>
</nav>

<header>
    <h1>Guitar Doctor</h1>
    <p>D&eacute;connexion Utilisateur</p>
</header>

  <div class="container">
    <h2>✅ Vous êtes maintenant déconnecté</h2>
    <p>Merci de votre visite. Vous allez être redirigé vers la page d’accueil dans quelques secondes...</p>
    <div class="button-container">
      <a href="index.html" class="btn-logout">Retour immédiat</a>
    </div>
  </div>
</body>
</html>