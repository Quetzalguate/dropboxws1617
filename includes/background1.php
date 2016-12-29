<?php
$anaus=$_GET['var'];

if($anaus==1){
    echo "licht an";
}
else {
    echo "
    <style>
    body {
        background-color: rgba(0, 0, 0, 0.6);
    }
</style>
    ";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
}