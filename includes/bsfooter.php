<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - BSfooter</title>

    <!-- Start Include Dateien -->
    <?php //include ("includes/coockie.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php include ("includes/connection.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
<?php

//1.0 DATEIGROESSE AUS DB AUSLESEN
//1.1 Dateigroessen in einem assoziativem Array speichern
$stmt3 = $pdo->prepare("SELECT dbdateien.dateigroesse FROM dbzuweisung INNER JOIN dbdateien ON dbdateien.dateiid = dbzuweisung.dateiid WHERE dbzuweisung.userid=$userid");
$stmt3->execute();
$result= $stmt3->fetchAll(PDO::FETCH_ASSOC);
//1.2 Jede Dateigroesse in Schleife ausgeben und in Variable speichern; Mit einem Plus zwischen jeder Dateigroesse
foreach($result as $show){

    foreach($show as $display){
        $summe+= $display;
    }
}

//1.3 Die Summe der Dateigroessen vom verfügbaren Speicher abziehen und freien Speicher ausgeben
$freierspeicher = 20 - $summe;
//echo "</br>Du hast noch: ".$freierspeicher ." mb frei!";

?>

<!-- Anfang Footer -->
<nav class="navbar navbar-fixed-bottom">
    <div class="container-fluid">
        <div class="text-right">
            <span class="label label-default">Freier Speicher: <?php echo $freierspeicher; ?> mb</span>
        </div>
        <p class="copyright small text-center">&copy; 2016/2017 Juan Carlos Velarde, Ludwig Stengelin</p>
        <p class="small text-center"> Icons from <a href="https://icons8.com/">Icons8</a>.</p>
    </div>
</nav>
<!-- Ende Footer -->
</body>
</html>