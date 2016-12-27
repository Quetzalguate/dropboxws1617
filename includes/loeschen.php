<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Minimalbox - loeschen</title>

    <!-- Start Include Dateien -->
    <?php include ("connection.php"); ?>
    <?php include ("bsfixednavbar.php"); ?>
    <?php include ("bsfooter.php"); ?>
    <?php include ("bseinbindung.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
    <?php
    $userid="1";
    $dateiname = $_GET['var'];

    //Ausgeben welche dateiid der dateiname hat, der von user xy hochgeladen wurde
    $stmt = $pdo->prepare("SELECT dateihash FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    //$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->execute();
    $dateihash= $stmt->fetch();
    //echo $dateihash[0];
    $dateihasherg = $dateihash[0];

    //Ausgeben welche dateiid der dateiname hat, der von user xy hochgeladen wurde
    $stmt1 = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt1->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    //$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt1->execute();
    $dateiid= $stmt1->fetch();
    //echo $dateiid[0];
    $dateiidzw = $dateiid[0];

    //Auslesen ob Besitzer gleich 0 oder 1
    $stmt2 = $pdo->prepare("SELECT besitzer FROM dbzuweisung WHERE dateiid=:dateiidzw AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt2->bindParam(':dateiidzw', $dateiidzw, PDO::PARAM_STR);
    $stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt2->execute();
    $besitzer= $stmt2->fetch();
    $besitzerzw = $besitzer[0];
    //echo "Berechtigung: ".$besitzerzw." !";

    //Wenn Besitzer = 1 dürfen die DB-Einträge und die Datei gelöscht werden
    if ($besitzerzw !='0'){
        echo "berechtigt datei zu löschen!";

        /*//DB-Eintrag aus dbzuweisung löschen --> Zeile löschen wo dateiid = xy
        $stmt3 = $pdo->prepare("DELETE FROM dbzuweisung WHERE dateiid=:dateiidzw AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt3->bindParam(':dateiidzw', $dateiidzw, PDO::PARAM_STR);
        $stmt3->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt3->execute();

        //DB-Eintrag aus dbdateien löschen --> Zeile löschen wo dateiname = xy
        $stmt4 = $pdo->prepare("DELETE FROM dbdateien WHERE dateiname=:dateiname"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt4->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        //$stmt4->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt4->execute();


        //Datei wird im Uploadverzeichnis gelöscht
        $datei = "../upload/".$dateihasherg;
        unlink($datei);
        header("Location: https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php");
        exit;*/
    }
    else {
        echo "
        <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Du bist nicht dazu berechtigt diese Datei zu löschen!</strong>
                    </div>
                </div>
            </div>
        ";
        header( "refresh:2;url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php" );
    }

    ?>
</body>
