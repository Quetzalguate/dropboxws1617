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
    $dateiname = $_GET['var'];
    //Ausgeben welche dateiid der dateiname hat, der von user xy hochgeladen wurde
    $stmt = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname AND userid=:userid ");
    $stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
    $stmt->bindParam(':userid', 1, PDO::PARAM_STR);
    $dateiid=$stmt->execute();
    echo $dateiid[0];
    //Auslesen ob Besitzer gleich 0 oder 1

    //Wenn Besitzer = 1 dürfen die DB-Einträge und die Datei gelöscht werden
    /*if ($besitzer=1){
        //DB-Eintrag aus dbdateien löschen --> Zeile löschen wo dateiname = xy
        //DB-Eintrag aus dbzuweisung löschen --> Zeile löschen wo dateiid = xy

        $datei = "../upload/gollum.jpg";
        unlink($datei);
    }
    else {
        echo "Die fehlen die Rechte um die Datei zu löschen!";
    }*/

    ?>
</body>
