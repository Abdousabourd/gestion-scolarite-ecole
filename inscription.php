
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription | Gestion d'une bibliothèque</title>

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

            <a href="#" class="h1"><b>Ges</b>-Scolarite-Ecole</a>

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

            <p class="login-box-msg">Enregistrer un utilisateur </p>

            <form action="inscription-traitement.php" method="post" novalidate>

                <!-- Le champs nom -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-nom">

                        Nom:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group">

                        <input type="text" name="nom" id="inscription-nom" class="form-control"
                               placeholder="Veuillez entrer votre nom"
                               value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {
                            echo $erreurs["nom"];
                        }

                        ?>

                    </span>

                </div>

                <!-- Le champs prenom -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-prenom">

                        Prénom:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group">

                        <input type="text" name="prenom" id="inscription-prenom" class="form-control"
                               placeholder="Veuillez entrer votre prénom"
                               value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) {
                            echo $erreurs["prenom"];
                        }

                        ?>

                    </span>

                </div>

                <!-- Le champs sexe -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-sexe">

                        Sexe:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="form-group clearfix">

                        <div class="icheck-primary d-inline">

                            <input type="radio" name="sexe" checked="" id="sexe-m" value="M">

                            <label for="sexe-m">M</label>

                        </div>

                        <div class="icheck-primary d-inline">

                            <input type="radio" name="sexe" checked="" id="sexe-f" value="F">

                            <label for="sexe-f">F</label>

                        </div>
                    </div>


                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["sexe"]) && !empty($erreurs["sexe"])) {
                            echo $erreurs["sexe"];
                        }

                        ?>

                    </span>

                </div>

                <!-- Le champs date de naissance -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-date-naissance">

                        Date de naissance:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control"
                               placeholder="Veuillez entrer votre date de naissance"
                               value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["date-naissance"]) && !empty($erreurs["date-naissance"])) {
                            echo $erreurs["date-naissance"];
                        }

                        ?>

                    </span>

                </div>

                <!-- Le champs email -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-email">

                        Email:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="email" name="email" id="inscription-email" class="form-control"
                               placeholder="Veuillex entrer votre address email"
                               value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-envelope"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["email"]) && !empty($erreurs["email"])) {
                            echo $erreurs["email"];
                        }

                        ?>

                    </span>

                </div>

                <!-- Le champs nom d'utilisateur -->
                <div class="col-sm-12 mb-3">

                    <label for="inscription-nom-utilisateur">

                        Nom d'utilisateur:

                        <span class="text-danger">(*)</span>

                    </label>

                    <div class="input-group mb-3">

                        <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur" class="form-control"
                               placeholder="Veuillez entrer votre nom d'utilisateur"
                               value="<?= (isset($donnees["nom-utilisateur"]) && !empty($donnees["nom-utilisateur"])) ? $donnees["nom-utilisateur"] : ""; ?>"
                               required>

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["nom-utilisateur"]) && !empty($erreurs["nom-utilisateur"])) {
                            echo $erreurs["nom-utilisateur"];
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
                  <!-- Le champs retapez mot de passe -->
                  <div class="col-sm-12 mb-3">

<label for="inscription-retapez-mot-passe">

    Retapez mot de passe:

    <span class="text-danger">(*)</span>

</label>

<div class="input-group mb-3">

    <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe"
           class="form-control" placeholder="Veuillez retaper votre mot de passe"
           value="<?= (isset($donnees["retapez-mot-passe"]) && !empty($donnees["retapez-mot-passe"])) ? $donnees["retapez-mot-passe"] : ""; ?>"
           required>

    <div class="input-group-append">

        <div class="input-group-text">

            <span class="fas fa-lock"></span>

        </div>

    </div>

</div>


     

                    <span class="text-danger">

                        <?php

                        if (isset($erreurs["retapez-mot-passe"]) && !empty($erreurs["retapez-mot-passe"])) {
                            echo $erreurs["retapez-mot-passe"];
                        }

                        ?>

                    </span>

                </div>

                <div class="row">

                    <div class="col-6"></div>

                    <!-- /.col -->
                    <div class="col-6">

                        <button type="submit" a href="dashbord.php" class="btn btn-primary btn-block">Inscription </a> </button>

                    </div>
                    <!-- /.col -->

                </div>

            </form>

            <a href="connexion.php" class="text-center mt-3">J'ai deja un compte</a>

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