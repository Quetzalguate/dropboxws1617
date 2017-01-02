<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - loeschen</title>


    <!-- Start Include Dateien -->
    <?php include ("coockie.php"); ?>
    <?php include ("connection.php"); ?>
    <?php include ("bsfixednavbar.php"); ?>
    <?php include ("bsfooter.php"); ?>
    <?php include ("bseinbindung.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
    <?php
    $dateiname = $_GET['var'];

    //Ausgeben welchen dateihash der dateiname hat, der von user xy hochgeladen wurde
    $stmt = $pdo->prepare("SELECT dateihash FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    //$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->execute();
    $erg= $stmt->fetch();
    //echo $dateihash[0];
    $dateihash = $erg[0];

    //Ausgeben welche dateiid der dateiname hat, der von user xy hochgeladen wurde
    $stmt1 = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt1->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    //$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt1->execute();
    $erg1= $stmt1->fetch();
    //echo $dateiid[0];
    $dateiid = $erg1[0];

    //Auslesen ob Besitzer gleich 0 oder 1
    $stmt2 = $pdo->prepare("SELECT besitzer FROM dbzuweisung WHERE dateiid=:dateiid AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt2->bindParam(':dateiid', $dateiid, PDO::PARAM_STR);
    $stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt2->execute();
    $erg2= $stmt2->fetch();
    $besitzer = $erg2[0];
    //echo "Berechtigung: ".$besitzerzw." !";

    //Wenn Besitzer = 1 dürfen die DB-Einträge und die Datei gelöscht werden
    if ($besitzer !='0'){
        //echo "berechtigt datei zu löschen!";

        //DB-Eintrag aus dbzuweisung löschen --> Zeile löschen wo dateiid = xy
        $stmt3 = $pdo->prepare("DELETE FROM dbzuweisung WHERE dateiid=:dateiid AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt3->bindParam(':dateiid', $dateiid, PDO::PARAM_STR);
        $stmt3->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt3->execute();

        //DB-Eintrag aus dbdateien löschen --> Zeile löschen wo dateiname = xy
        $stmt4 = $pdo->prepare("DELETE FROM dbdateien WHERE dateiname=:dateiname"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt4->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        //$stmt4->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt4->execute();


        //Datei wird im Uploadverzeichnis gelöscht
        $datei = "../upload/".$dateihash;
        unlink($datei);

        echo "
            <div class=\"container-fluid\">
            <div class='col-lg-4'></div>
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-success\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Datei wurde erfolgreich gelöscht!</strong>
                    </div>
                </div>
            </div>
        ";
        //header( "refresh:2;url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php" );
        echo "
                    <meta http-equiv=\"refresh\" content=\"2; url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php
                ";
    }
    else {
        echo "
        <div class=\"container-fluid\">
        <div class='col-lg-4'></div>
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Du bist nicht dazu berechtigt diese Datei zu löschen!</strong>
                    </div>
                </div>
            </div>
        ";
        //header( "refresh:2;url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php" );
        echo "
                    <meta http-equiv=\"refresh\" content=\"2; url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php
                ";
    }

    ?>
</body>
