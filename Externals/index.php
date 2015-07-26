<?php
session_start();
echo $_SESSION['name'];
echo $_SESSION['id'];
echo "I  here in Index";
echo "<a href='logout.php'>Logout</a>";
?>