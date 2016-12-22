<!-- Start Include Dateien -->
<?php include ("includes/bsfixednavbar.php"); ?>
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>
<?php include ("includes/connection.php"); ?>
<!-- Ende Include Dateien -->


<!-- Start Dateiübersicht -->
<?php ?>
<!-- Ende Dateiübersicht -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Datei-Teilen</title>

</head>

<body>

<?php
echo $_GET['var'];
$dateiid = $_GET['var'];

$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare ("SELECT dateiname FROM dbdateien WHERE dateiid= $dateiid");
$statement->execute();
$dateiname= $statement->fetch();
//<?php echo $dateiname[0];?>
?>

</br></br>
<div class="container-fluid">
    <div class="col-lg-3">
        <h3><u>Datei teilen</u></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bereits geteilt mit:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User-Variable</td>
                    </tr>
                </tbody>
            </table>
        <form>
            <div class="form-group">
                <label for="username">"<?php echo $dateiname[0];?>" mit Nutzer teilen:</label>
                <input type="text" class="form-control" id="username" placeholder="Email deines Freundes eingeben">
            </div>
            <button type="submit" class="btn btn-default">Teilen</button>
        </form>
    </div>
</div>
</body>
</html>