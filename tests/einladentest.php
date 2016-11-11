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


// send email
mail("juancavel93@gmail.com","My subject",$msg);
?>

</body>
</html>