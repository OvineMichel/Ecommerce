<?php
session_start();
session_destroy();
header("location: ../usuarios/login.php?sairok");
?>