<?php
include 'conexion.php';
$db = new db();
session_start();
if(!isset($_SESSION['nombre'])){
    exit();
}
else{
    
        $id = $_POST['editId'];
        $vuelo = $_POST['editVuelo'];
        $origen = $_POST['editOrigenVuelo'];
        $destino = $_POST['editDestinoVuelo'];
        $horario = $_POST['editHorarioVuelo'];
        $compania = $_POST['editCompaniaVuelo'];
        $db->editarVuelo($id, $vuelo, $origen, $destino, $horario, $compania);
        
    
}
