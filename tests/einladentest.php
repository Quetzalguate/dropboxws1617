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
$submit = $_POST['submit'];

if(isset($submit)){

   echo "hallo";
    mail("$email","My subject","$msg");
    echo $msg;
    echo $email;

}



?>

</body>
</html>