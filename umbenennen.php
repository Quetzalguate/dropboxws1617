




<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Minimalbox - Umbenennen</title>

    <!-- Start Include Dateien -->
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php include ("includes/connection.php"); ?>
    <!-- Ende Include Dateien -->
</head>

<body>
<?php $dateiname = $_GET['var']; ?>
</br></br>
<div class="container-fluid">
    <div class="col-lg-12">
        <h3><u>Datei "<?php echo $dateiname; ?>" umbenennen</u></h3>
        <form action = umbenennen.php?var=<?php echo $dateiname; ?> method="POST" role ="form">
            <div class="form-group">
                <input type="text" class="from-control" name="neuerdateiname" placeholder=" Name.Dateiendung"
            </div>
            <button type="submit" class="btn btn-default" name="submit">Umbenennen</button>
        </form>
    </div>
</div>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->

<?php

//Variablen deklarieren
$userid="1";
$dateiname = $_GET['var'];
$neuerdateiname = $_POST['neuerdateiname'];

//1.0 BERECHTIGUNG ZUM UMBENENNEN ÜBERPRÜFEN
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

if ($besitzer !='0'){

    if (isset($_POST['submit']) && !empty($neuerdateiname)){

        //2.0 DATEI UMBENENNEN
        //2.1 Alten Dateihash auslesen und in Variable speichern $alterdateihash
        $stmt3 = $pdo->prepare("SELECT dateihash FROM dbdateien WHERE dateiname= :dateiname");// Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt3->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        $stmt3->execute();
        $erg= $stmt3->fetch();
        $alterdateihash=$erg[0];

        //2.2 Neuen Dateihash erstellen
        $md5 = md5($neuerdateiname);
        $extension=strrchr($dateiname,"."); //gibt Zeichen wider ab dem .
        $neuerdateihash = $md5.$userid.$extension;

        //2.3 Neuer Dateihash wird in dbdateien gespeichert
        $stmt4 = $pdo->prepare("UPDATE dbdateien SET dateihash=:neuerdateihash WHERE dateiname= :dateiname");// Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt4->bindParam(':neuerdateihash', $neuerdateihash, PDO::PARAM_STR);
        $stmt4->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        $stmt4->execute();

        //2.4 Neuer Dateiname wird in dbdateien gespeichert
        $stmt5 = $pdo->prepare("UPDATE dbdateien SET dateiname=:neuerdateiname WHERE dateihash= :neuerdateihash");
        $stmt5->bindParam(':neuerdateiname', $neuerdateiname, PDO::PARAM_STR);
        $stmt5->bindParam(':neuerdateihash', $neuerdateihash, PDO::PARAM_STR);
        $stmt5->execute();

        //2.5 Datei auf dem Server wird umbenannt
        $alterdateihashpfad = "upload/".$alterdateihash;
        $neuerdateihashpfad = "upload/".$neuerdateihash;
        rename($alterdateihashpfad,$neuerdateihashpfad);

        echo "
            <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-success\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Datei wurde erfolgreich umbenannt!</strong>
                    </div>
                </div>
            </div>
        ";

    }
    else {
        echo "
        <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Wähle einen passenden Namen aus - Die Dateiendung muss beibehalten werden!</strong>
                    </div>
                </div>
            </div>
        ";
    }

}

else {
    echo "
        <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Du bist nicht dazu berechtigt diese Datei umzubennen!</strong>
                    </div>
                </div>
            </div>
        ";
}

?>

</body>
</html>