<!-- Start Include Dateien -->
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>

<!-- Ende Include Dateien -->


<!-- Start Registrierung -->
<?php ?>
<!-- Ende Registrierung -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Logi</title>

</head>

<body>
<!-- Anfang Header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="navbar">
                <ul class="nav nav-pills  navbar-right">
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/reg.php" class="glyphicon glyphicon-ok-sign"> Registrieren</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Ende Header -->
</br></br></br></br></br>
<div class="container-fluid">
    <div class="row">
        <!-- Start Logo -->
        <div class="col-lg-6">
            <img class="img-responsive pull-right" src="images/placeholder-Copy.png" alt="image placeholder" width="300" height="200">
        </div>
        <!-- Ende Logo -->

        <!-- Anfang Registrierungsformular -->
        <div class="col-lg-3">
            <form>
                <div class="form-group">
                    <label for="username">Benutzername:</label>
                    <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="pw1">Passwort:</label>
                    <input type="password" class="form-control" id="pw1">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
        <!-- Ende Registrierungsformular -->
    </div>
</div>


</body>
</html>