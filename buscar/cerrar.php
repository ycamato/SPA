<?php

    session_start();

    unset($_SESSION['doc']);
    unset($_SESSION['rol']);
    $_SESSION= array();
    session_destroy();
    session_write_close();
    header("Location: ../index.php");


?>