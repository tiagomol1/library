<?php
    session_start();

    if ($_SESSION['usuario'] == ""){
        header("Location: ../pages/safadinho.php");
    }
 ?>
