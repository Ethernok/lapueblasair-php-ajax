<?php
    session_start();
    include_once 'conexion.php';
    $db = new db();
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $db->procesarLogin($user, $pass);
    
?>