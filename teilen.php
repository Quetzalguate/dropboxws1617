<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Datei-Teilen</title>

    <!-- Start Include Dateien -->
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php include ("includes/connection.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
<?php
//Zugehöriger Dateiname zur Datei-ID auslesen
$dateiid = $_GET['var'];
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare ("SELECT dateiname FROM dbdateien WHERE dateiid= $dateiid");
$statement->execute();
$dateiname= $statement->fetch();

//Nutzer-Email mit denen die Datei bereits geteilt wurde werden ausgelesen
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement4 = $pdo->prepare("SELECT dbuser.email
                            FROM dbuser INNER JOIN dbzuweisung 
                            ON dbuser.userid = dbzuweisung.userid
                            WHERE dbzuweisung.dateiid=1 AND dbzuweisung.besitzer =0");
$statement4->execute();
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
            <?php while ($useremail = $statement4->fetch()) {?>
                <tr>
                    <td><?php echo $useremail[0]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <form action = teilen.php?var=<?php echo $dateiid[0]; ?> method="post" role ="form">
            <div class="form-group">
                <label for="username">"<?php echo $dateiname[0];?>" mit Nutzer teilen:</label>
                <input type="email" class="form-control" id="email" name = "email" placeholder="Email deines Freundes eingeben">
            </div>
            <button type="submit" class="btn btn-default" name="teilen">Teilen</button>
        </form>
    </div>
</div>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->

<?php

//User-ID von Nutzer mit dem die Datei geteilt werden soll wird ausgelesen
$email = $_POST['email'];
if(isset($_POST['teilen']) && !empty($email) ) {
    $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
    $statement2 = $pdo->prepare ("SELECT userid FROM dbuser WHERE email= '$email'");
    $statement2->execute();
    $uid= $statement2->fetch();
    //echo $uid[0];

    //Dem User wird die Datei-ID zugeordnet - Datei wird geteilt
    $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
    $statement3 = $pdo->prepare ("INSERT INTO dbzuweisung (userid,dateiid) VALUES ($uid[0], $dateiid[0])");
    $statement3->execute();

    $count = $statement3->rowCount();
    if ($count !=0){
        echo "hallo";
    }
}




?>

</body>
</html>