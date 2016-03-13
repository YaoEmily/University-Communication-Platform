<?php
session_id($_GET["sid"]);
session_start();
session_destroy();
unset($_SESSION["account"]);
header("Location:homepage.html");
?>