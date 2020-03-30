<?php
    session_start();

    $_SESSION['usuario'] = "";

    header("Location: pages/login.php");
 ?>
