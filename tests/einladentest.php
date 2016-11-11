<html>
<body>

<form action="einladentest.php" method="post">
    email: <input type="text" name="name"><br>
    nachricht: <input type="text" name="email"><br>
    <input type="submit">
</form>


<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("juancavel93@gmail.com","My subject",$msg);
?>

</body>
</html>