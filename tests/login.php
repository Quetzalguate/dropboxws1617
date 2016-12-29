<?php
include("connection.php");

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM dbuser WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung PW
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['userid'];
        die('Login erfolgreich. Hier gelangen Sie zur <a href="session.php">Startseite!</a>');
        header( "url=https://mars.iuk.hdm-stuttgart.de/~jv029/preloader.php" );
    } else {
        $errorMessage = "E-Mail oder Passwort ist ungültig<br>";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include ("/home/jv029/public_html/includes/coockie.php"); ?>
</head>
<body>

<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action="?login=1" method="post">
    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email"><br><br>

    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="passwort"><br>

    <input type="submit" value="Abschicken">
</form>
</body>
</html>