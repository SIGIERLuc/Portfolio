<?php
require('./php/model.php');

$array = get_project_id($connect);
?>
<!DOCTYPE html>

<html>
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="fixed-top navbar navbar-expand-lg navbar-dark  crop-navbar ">
                        <a class="navbar-brand" href="#"></a>
                        <a class="navbar-brand" href="#">
                            <img src="./img/logo-sniffer-test.png" class="d-inline-block align-top logo" alt="">

                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a id="description" class="nav-link" href="#">Bienvenue
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <li>
                                    <a class="nav-link" href="#details">A propos</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#project">Mes projets</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#contact">Me contacter</a>
                                </li>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Section 1 Description -->
        <section id="description">
            <div class="container">
                <div class="row banner">
                    <div class="col-md-12">

                        <h1>Bienvenue sur mon Portfolio</h1>
                        <hr>
                        <p class="introText">
                            Vous pourrez découvrir sur ce site tous les projets que j'ai menés à bien pendant ma
                            formation de développeur d'application front-end au sein d'<a class="link" target="_blank" href="https://openclassrooms.com/fr/paths/60-developpeur-dapplication-frontend">OpenClassRoom</a>,
                            ainsi que certains
                            de mes projets personnels.
                        </p>

                    </div>
                </div>
            </div>
        </section>
    </header>

    <!-- Section 2 Details -->

    <section id="details">
        <div class="container">
            <h2 id="2">A propos</h2>
            <p>Les languages et framework que je maîtrise.</p>
            <hr class="details">
            <div class="row">
                <?php
                $skill = get_skill($connect);
                foreach ($skill as $key => $value) {
                    require('./php/template-skill.php');
                }
                ?>
            </div>

            <hr>
        </div>
    </section>

    <!-- Section 3 A propos -->

    <section id="project">
        <div class="container" id="myGroup">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        MES PROJETS
                    </h2>
                    <hr>
                </div>
            </div>
            <div class="projectContainer">
                <p>
                    A travers ces projets j'ai appris de nouvelles compétences et affiné certaines que je possedais
                    déjà.<br>
                    Certain projets ne sont pas visuels mais un lien vers mon github vous permettra de voir le travail
                    fourni pour ces derniers.
                </p>
                <div class="col-sm-12 projectButtonGroup">
                    <?php
                    foreach ($array as $key => $value) {
                        $project_button = get_project($value["ID"], $connect);
                        require('./php/template-project-button.php');
                    }
                    ?>
                </div>
                <div id="collapsedProject" class="row">
                    <?php
                    foreach ($array as $key => $value) {
                        $project_results = get_project($value["ID"], $connect);
                        $button_array = get_button($value["ID"], $connect);
                        require('./php/template-project.php');
                    }
                    mysqli_close($connect);
                    ?>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <!-- Section 4 Contact  -->
    <section id="contact">
        <div class="container">
            <div class="row wip">
                <div class="col-md-12">
                    <!-- <div id="gris"></div> -->
                    <h2>
                        Me contacter
                    </h2>
                    <form method="post">
                        <input type="text" name="name" placeholder="Nom">
                        <input type="text" name="email" placeholder="Email">
                        <input type="text" name="subject" placeholder="Sujet">
                        <textarea placeholder="Votre message" name="message" id="message" rows="10" cols="50"></textarea>

                        <button type="submit">
                                Envoyer le mail
                            </button>
                    </form>
                    <?php
                    if (isset($_POST['message'])) {
                        $position_arobase = strpos($_POST['email'], '@');
                        if ($position_arobase === false) {
                            echo '<p>Votre email doit comporter un arobase.</p>';
                        } else {
                            $retour = mail('loakky@gmail.com', $_POST['name'] . $_POST['email'] . $_POST['subject'], $_POST['message']);
                            if ($retour)
                                echo '<p>Votre message a été envoyé.</p>';
                            else
                                echo '<p>Erreur.</p>';
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer  -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <p>
                        <u>Développeur</u> : SIGIER Luc<br>
                        <u>Logo-Designer </u>: SIGIER Sarah<br>
                        <u>Relectrice</u> : SIGIER Clara<br>
                        <u>Design</u> : Tajam
                    </p>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <h4>
                        Mes réseaux
                    </h4>
                    <a href="https://www.facebook.com/luc.sigier" target="_blank"><img src="./img/footer/facebook.png"></a>
                    <a href="https://twitter.com/LucSigier" target="_blank"><img src="./img/footer/twitter.png"></a>
                    <a href="https://www.linkedin.com/in/luc-sigier-244b72148/" target="_blank"><img src="./img/footer/linkedin.png"></a>
                    <a href="mailto:lucsigier@gmail.com" target="_blank"><img src="./img/footer/gmail.png"></a>
                </div>
            </div>
        </div>
    </footer>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="./js/project.js"></script>
<script src="./js/script.js"></script>



</html>