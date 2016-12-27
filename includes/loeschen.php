<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Minimalbox - loeschen</title>

    <!-- Start Include Dateien -->
    <?php include ("connection.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
    <?php
    $userid="1";
    $dateiname = $_GET['var'];

    //Ausgeben welche dateiid der dateiname hat, der von user xy hochgeladen wurde
    $stmt = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    //$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt->execute();
    $dateiid= $stmt->fetch();
    echo $dateiid[0];
    $dateiidzw = $dateiid[0];

    //Auslesen ob Besitzer gleich 0 oder 1
    $stmt2 = $pdo->prepare("SELECT besitzer FROM dbzuweisung WHERE dateiid=:dateiidzw AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
    $stmt2->bindParam(':dateiidzw', $dateiidzw, PDO::PARAM_STR);
    $stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);
    $stmt2->execute();
    $besitzer= $stmt2->fetch();
    echo $besitzer[0];
    $besitzerzw = $besitzer[0];

    //Wenn Besitzer = 1 dürfen die DB-Einträge und die Datei gelöscht werden
    if ($besitzerzw=1){
        echo "berechtigt datei zu löschen!";
        //DB-Eintrag aus dbdateien löschen --> Zeile löschen wo dateiname = xy
        $stmt3 = $pdo->prepare("DELETE FROM dbdateien WHERE dateiname=:dateiname AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt3->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        $stmt3->bindParam(':userid', $userid, PDO::PARAM_STR);
        $stmt3->execute();

        //DB-Eintrag aus dbzuweisung löschen --> Zeile löschen wo dateiid = xy

        /*$datei = "../upload/gollum.jpg";
        unlink($datei);*/
    }
    else {
        echo "Die fehlen die Rechte um die Datei zu löschen!";
    }

    ?>
</body>
