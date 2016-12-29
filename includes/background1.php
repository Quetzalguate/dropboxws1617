<?php
$anaus=$_GET['var'];

if($anaus==1){
    echo "licht an";
}
else {
    echo "
    <style>
    body {
        background-image: url(\"home/images/minimalboxbackgroundtrans.jpg\");
    }
</style>
    ";
}