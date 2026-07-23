<?php

if (isset ($_POST['submit'])){
    echo $_POST['password'];
}
?>

<form action="isser.php" method="post">
    <input type="text" name="nama">
    <input type="text" name="password">
    <input type="submit" name="submit">
</form>