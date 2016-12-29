<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Datei-Teilen</title>

    <!-- Start Include Dateien -->
    <?php include ("includes/coockie.php"); ?>
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php include ("includes/connection.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
    <?php
    $dateiname = $_GET['var'];
    $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);

    //1.0 BERECHTIGUNG ZUM TEILEN ÜBERPRÜFEN
    //1.1 Zugehörige Dateiid zum Dateinamen ausgeben
    $stmt1 = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt1->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    $stmt1->execute();
    $erg1= $stmt1->fetch();
    $dateiid = $erg1[0];

    //1.2 Auslesen ob Besitzer gleich 0 oder 1
    $stmt2 = $pdo->prepare("SELECT besitzer FROM dbzuweisung WHERE dateiid=:dateiid AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt2->bindParam(':dateiid', $dateiid, PDO::PARAM_STR);
    $stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt2->execute();
    $erg2= $stmt2->fetch();
    $besitzer = $erg2[0];

    if ($besitzer !='0') {

        //2.0 NUTZER MIT DENEN DATEI BEREITS GETEILT WURDE AUSGEBEN

        //2.1 Nutzer-Email mit denen die Datei bereits geteilt wurde werden ausgelesen
        $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
        $statement4 = $pdo->prepare("SELECT dbuser.email
                                    FROM dbuser INNER JOIN dbzuweisung 
                                    ON dbuser.userid = dbzuweisung.userid
                                    WHERE dbzuweisung.dateiid='$dateiid' AND dbzuweisung.besitzer =0");
        $statement4->execute();


        //3.0 DATEI TEILEN
        //3.1 User-ID von Nutzer mit dem die Datei geteilt werden soll wird ausgelesen
        $email = $_POST['email'];
        if (isset($_POST['teilen']) && !empty($email)) {
            $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
            $statement2 = $pdo->prepare("SELECT userid FROM dbuser WHERE email= '$email'");
            $statement2->execute();
            $uid = $statement2->fetch();
            //echo $uid[0];

            //3.1 Dem User wird die Datei-ID zugeordnet - Datei wird geteilt
            $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
            $statement3 = $pdo->prepare("INSERT INTO dbzuweisung (userid,dateiid) VALUES ($uid[0], $dateiid[0])");
            $statement3->execute();

            //3.1 Überprüfung ob eine Zeile erfolgreich von SQL Statement betroffen ist
            $count = $statement3->rowCount();
            if ($count != 0) {

                echo "
                    <div class=\"container-fluid\">
                    <div class='col-lg-4'></div>
                        <div class=\"col-lg-4\">
                            <div class=\"alert alert-success\">
                                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                <strong>Datei wurde erfolgreich geteilt!</strong>
                            </div>
                        </div>
                    </div>
                ";
                //sleep(5);
                echo "
                    <meta http-equiv=\"refresh\" content=\"3; url=https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php?var=$dateiname\">
                ";
                //header("Refresh:0");
            } else
                echo "
                        <div class=\"container-fluid\">
                        <div class='col-lg-4'></div>
                        <div class=\"col-lg-4\">
                            <div class=\"alert alert-danger\">
                                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                <strong>Datei konnte leider nicht geteilt werden!</strong>
                            </div>
                        </div>
                    </div>
            ";
        }
    }
    else {
        echo "
                        <div class=\"container-fluid\">
                        <div class='col-lg-4'></div>
                        <div class=\"col-lg-4\">
                            <div class=\"alert alert-danger\">
                                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                                <strong>Du bist leider nicht dazu berechtigt diese Datei zu teilen!</strong>
                            </div>
                        </div>
                    </div>
            ";
    }
        ?>

<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->

    </br></br>
    <div class="container-fluid">
        <div class='col-lg-4'></div>
        <div class="col-lg-4" align="center">
            <h3>Teile eine Datei</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Bereits geteilt mit:</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($useremail = $statement4->fetch()) {?>
                    <tr>
                        <td><?php echo $useremail[0]; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php echo $tabelle;?>
            <form action = teilen.php?var=<?php echo $dateiname; ?> method="post" role ="form">
                <div class="form-group">
                    <label for="username">"<?php echo $dateiname;?>" mit Nutzer teilen:</label>
                    <input type="email" class="form-control" id="email" name = "email" placeholder="Email deines Freundes eingeben">
                </div>
                <button type="submit" class="btn btn-default" name="teilen">Teilen</button>
            </form>
        </div>
    </div>

</body>
</html>