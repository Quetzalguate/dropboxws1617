<?php
$anaus=$_GET['var'];

if($anaus==1){
    echo "
    <style>
    body {
        background-color: rgba(255, 255, 255, 0.9);
    }
</style>
    ";
    header( "refresh:2;url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php" );
}
else {
    echo "
    <style>
    body {
        background-color: rgba(0, 0, 0, 0.6);
    }
</style>
    ";
    header( \"refresh:2;url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php\" );
}