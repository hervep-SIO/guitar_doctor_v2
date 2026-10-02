<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'guitar';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

// Récupération des données du formulaire
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$mail = $_POST['email'] ?? '';
$newsletter = ($_POST['newsletter'] ?? 'non') === 'oui' ? 1 : 0;

// Génération d’un ID unique
$sql_id = "SELECT MAX(id) AS max_id FROM utilisateur";
$result = mysqli_query($conn, $sql_id);
$row = mysqli_fetch_assoc($result);
$new_id = $row['max_id'] + 1;

// Requête d’insertion
$sql = "INSERT INTO utilisateur (id, login, password, nom, prenom, mail, newsletter)
        VALUES ('$new_id', '$login', '$password', '$nom', '$prenom', '$mail', '$newsletter')";

if (mysqli_query($conn, $sql)) {
    echo "<h2>✅ Inscription réussie !</h2>";
    echo "<p>Voici les informations enregistrées :</p>";
    echo "<ul>";
    echo "<li><strong>ID :</strong> $new_id</li>";
    echo "<li><strong>Login :</strong> $login</li>";
    echo "<li><strong>Mot de passe :</strong> $password</li>";
    echo "<li><strong>Nom :</strong> $nom</li>";
    echo "<li><strong>Prénom :</strong> $prenom</li>";
    echo "<li><strong>Email :</strong> $mail</li>";
    echo "<li><strong>Newsletter :</strong> " . ($newsletter ? 'Oui' : 'Non') . "</li>";
    echo "</ul>";
} else {
    echo "<h2>❌ Erreur lors de l'inscription</h2>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>