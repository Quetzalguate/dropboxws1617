<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Ende Bootstrap Einbindung -->
<?php
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";

$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dateiname FROM dbzuordnung WHERE userid =1");
$statement->execute();
$erg = $statement->fetch()


//var_dump($dateiname);


//http://www.php-einfach.de/mysql-tutorial/komplexere-datenabfrage/
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Dateiübersicht</title>

</head>

<body>
</br></br>
<div class="container-fluid">
    <h3><u>Dateiübersicht</u></h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Dateiname</th>
            <th>Dateigröße</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($erg as $dateiname): ?>
        <tr>
            <td>
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span><?php echo $dateiname; ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/umbenennen.php">Umbenennen</a></li>
                        <li><a href="#">Herunterladen</a></li>
                        <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php">Teilen</a></li>
                        <li><a href="#">Löschen</a></li>
                    </ul>
                </div>
            </td>
            <td>Dateigröße-Variable</td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>