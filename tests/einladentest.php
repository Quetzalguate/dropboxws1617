<html>
<body>

<form action="einladentest.php" method="post">
    email: <input type="text" name="email"><br>
    nachricht: <input type="text" name="nachricht"><br>
    <input type="submit">
</form>


<?php
$msg = $_POST['nachricht'];
$email = $_POST['email'];
if(isset($submit)) {

    mail($email,"My subject",$msg);
    echo $_POST['nachricht'];
    echo $_POST['email'];
}

?>

</body>
</html>