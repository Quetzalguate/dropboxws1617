<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Dropbox</title>
</head>

<body>
<h1>Herzlich Willkommen</h1>

<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=u-jv029', 'jv029', 'IeBu2chie3');
?>
<?php
$showFormular = true;

if(isset($_GET['register'])) {
    $error = false;
    $user = $_POST['user'];
    $passwort = $_POST['passwort'];


    if(strlen($user) == 0) {
        echo 'Bitte ein Nutzer angeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }

    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM dbuser WHERE user = :user");
        $result = $statement->execute(array('user' => $user));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Dieser Name ist bereits vergeben<br>';
            $error = true;
        }
    }


    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO dbuser (user, passwort) VALUES (:user, :passwort)");
        $result = $statement->execute(array('user' => $user, 'passwort' => $passwort_hash));

        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}

if($showFormular) {
    ?>

    <form action="?register=1" method="post">
        user:<br>
        <input type="user" size="40" maxlength="250" name="user"><br><br>

        Dein Passwort:<br>
        <input type="password" size="40"  maxlength="250" name="passwort"><br>

        Passwort wiederholen:<br>
        <input type="password" size="40" maxlength="250" name="passwort2"><br><br>

        <input type="submit" value="Abschicken">
    </form>

    <?php
}
?>

</body>
</html>
