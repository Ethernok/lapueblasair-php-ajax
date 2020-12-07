<?php
include ('conexion.php');
$db = new db();
    session_start();
    session_destroy();
    $db->close();
    header('Location: login.php');

?>