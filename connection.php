<?php

include 'function.php';

$user_connected = check_if_user_conneted();

if($user_connected){
    header("location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion | Gestion d'une bibliothèque</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">

<div class="col-sm-5">

    <div class="card card-outline card-primary">

        <div class="card-header text-center">

            <a href="#" class="h1"><b>Ges</b>Bibliothèque</a>

        </div>

        <?php

        $erreurs = array();

        $donnees = array();

        $message = array();

        if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {
            $erreurs = json_decode($_GET["erreurs"], true);
        }

        if (isset($_GET["donnees"]) && !empty($_GET["donnees"])) {
            $donnees = json_decode($_GET["donnees"], true);
        }

        if (isset($_GET["message"]) && !empty($_GET["message"])) {
            $message = json_decode($_GET["message"], true);
        }

        ?>

        <div class="card-body">

        <?php

            if(isset($message["statut"]) && 0 == $message["statut"]){

                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $message["message"]; ?>
                    </div>
                <?php

            }else if(isset($message["statut"]) && 1 == $message["statut"]){

                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $message["message"]; ?>
                    </div>
                <?php
                
            }

        ?>

            <p class="login-box-msg">Se connecter</p>

            <form action="connexion-traitement.php" method="post" novalidate>

                <!-- Le champs email / nom utilisateur -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-email">

                        Email ou nom d'utilisateur:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="text" name="email-nom-utilisateur" id="inscription-email" class="form-control"
                               placeholder="Veuillez entrer votre address email ou votre nom d'utilisateur"
                               value="<?= (isset($donnees["email-nom-utilisateur"]) && !empty($donnees["email-nom-utilisateur"])) ? $donnees["email-nom-utilisateur"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-envelope"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["email-nom-utilisateur"]) && !empty($erreurs["email-nom-utilisateur"])) {
                            echo $erreurs["email-nom-utilisateur"];
                        }

                        ?>

                    </span>

                </div>

                <!-- Le champs mot de passe -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-mot-passe">

                        Mot de passe:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control"
                               placeholder="Veuillez entrer votre mot de passe"
                               value="<?= (isset($donnees["mot-passe"]) && !empty($donnees["mot-passe"])) ? $donnees["mot-passe"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["mot-passe"]) && !empty($erreurs["mot-passe"])) {
                            echo $erreurs["mot-passe"];
                        }

                        ?>

                    </span>

                </div>

                <div class="row">

                    <div class="col-6"></div>

                    <!-- /.col -->
                    <div class="col-6">

                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>

                    </div>
                    <!-- /.col -->

                </div>

            </form>

            <a href="inscription.php" class="text-center mt-3">Je n'ai pas de compte</a>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/js/adminlte.min.js"></script>
</body>
</html>