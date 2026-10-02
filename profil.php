<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

// Connexion à la base
$conn = mysqli_connect('localhost', 'root', '', 'guitar');
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT id, login, nom, prenom, mail FROM utilisateur WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil utilisateur</title>
  <link rel="stylesheet" href="./css/style-global.css">
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
    <p>Profil Utilisateur</p>
</header>

  <div class="container profil">
    <h2>Bienvenue, <?= htmlspecialchars($user['login']) ?> 👋</h2>
    <div class="profil-info">
      <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
      <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
      <p><strong>Email :</strong> <?= htmlspecialchars($user['mail']) ?></p>
      <p><strong>ID utilisateur :</strong> <?= htmlspecialchars($user['id']) ?></p>
    </div>
    <a href="logout.php" class="btn-deconnexion">Se déconnecter</a>
  </div>
</body>
</html>