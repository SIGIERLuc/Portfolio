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
    include 'index.php';

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];
    if (isset($_POST['message'])) {
        $retour = mail('loakky@gmail.com', strval($Name) . strval($Email) . strval($Subject), strval($Message));
    }
    ?>
</body>

</html>