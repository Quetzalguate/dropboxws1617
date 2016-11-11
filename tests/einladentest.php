<html>
<body>

<form action="einladentest.php" method="post">
    email: <input type="text" name="name"><br>
    nachricht: <input type="text" name="email"><br>
    <input type="submit">
</form>


<?php
$nachricht = $_POST['nachricht'];
$email = $_POST['email'];
$msg = "$nachricht";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("$email","My subject",$msg);
?>

</body>
</html>