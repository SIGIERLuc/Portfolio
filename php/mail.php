<?php
header("Location: https://portfolio-sigier.com/");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Envoi d'un email par formulaire</title>
</head>

<body>
    <?php
    $retour = mail($_POST['email'], $_POST['subject'], $_POST['message']);
    if ($retour) {
        echo '<p>Votre message a bien été envoyé !</p>';
    }
    ?>
</body>

</html>