<?php
// Vérifie que les données ont bien été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Adresse de destination
    // $to = "contact@guitardoctor.fr";
	
    // Construction du corps de l'email
    $email_body = "Message de : $email\n\n";
    $email_body .= "Objet : $subject\n\n";
    $email_body .= "Message :\n$message\n";

    // En-têtes de l'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

// Envoi de l'email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<p>✅ Votre message a été envoyé avec succès.</p>";
        echo "<h3>Détails du message envoyé :</h3>";
        echo "<ul>";
        echo "<li><strong>Destinataire :</strong> $to</li>";
        echo "<li><strong>Expéditeur :</strong> $email</li>";
        echo "<li><strong>Objet :</strong> $subject</li>";
        echo "<li><strong>Message :</strong><br><pre>$message</pre></li>";
        echo "</ul>";
    } else {
        echo "<p>❌ Une erreur est survenue lors de l'envoi du message.</p>";
    }
} else {
    echo "<p>⚠️ Méthode non autorisée.</p>";
}

?>