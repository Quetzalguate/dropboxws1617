<nav class="navbar"> <!-- "<nav class="navbar navbar-fixed-top">" -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php">Dropbox</a></li>
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/upload.php">Upload</a></li>
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/suchen.php">Suche</a></li>
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/einladen.php">Einladen</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/profil.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11">
                <div class="text-left">
                    <span class="label label-default">Freier Speicher: x mb</span>
                    <label >Freier Speicher: x mb</label>
                </div>
            </div>
            <div class="col-lg-1">
                <form action="bsfixednavbar.php" method="POST" role="form">
                    <div class="form-check" class="text-right">
                        <input type="checkbox" name="licht" checked data-toggle="toggle" data-on="Licht an" data-off="Licht aus" data-onstyle="default" data-offstyle="default" data-size="mini">
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

<?php
if(isset($_POST['licht'])){
    echo "hallo";
}

?>