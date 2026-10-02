<?php
session_start();

// 🔧 Paramètres de connexion
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'guitar';

// 🔌 Connexion à la base
$conn = mysqli_connect($host, $user, $password, $database);

// ❌ Vérification de la connexion
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// 📥 Récupération des données du formulaire
$login = $_POST['login'] ?? '';
$motdepasse = $_POST['password'] ?? '';

// 🛡️ Sécurisation minimale
$login = mysqli_real_escape_string($conn, $login);
$motdepasse = mysqli_real_escape_string($conn, $motdepasse);

// 🔍 Requête SQL
$sql = "SELECT id, login, password FROM utilisateur WHERE login = '$login'";
$result = mysqli_query($conn, $sql);

// 📌 Vérification du résultat
if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // 🔐 Comparaison directe du mot de passe
    if ($motdepasse === $user['password']) {
        // ✅ Connexion réussie
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        header("Location: profil.php");
        exit();
    } else {
        $erreur = "Mot de passe incorrect.";
    }
} else {
    $erreur = "Login introuvable.";
}

// 🔒 Fermeture
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Erreur de connexion</title>
</head>
<body>
  <h2>Erreur</h2>
  <p><?= htmlspecialchars($erreur) ?></p>
  <a href="index.html">Retour à la page de connexion</a>
</body>
</html>