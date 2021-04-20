<?php 
include 'conexion.php';
session_start();
$db = new db();
$db->mostrarTabla();
?>