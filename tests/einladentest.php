<html>
<body>

<form action="einladentest.php" method="post">
    email: <input type="text" name="email"><br>
    nachricht: <input type="text" name="nachricht"><br>
    <input type="submit" name="submit">
</form>


<?php
$msg = $_POST['nachricht'];
$email = $_POST['email'];

if(isset($_POST['submit'])){

    mail("$email","My subject","$msg");
    echo "Einladung wurde versendet";

}



?>

</body>
</html>