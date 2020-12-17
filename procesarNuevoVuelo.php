<?php
    include 'conexion.php';
    $db = new db();
    session_start();
    if(!isset($_SESSION['nombre'])){
        exit();
    }
    else{
            $id = $_POST['idVuelo'];
            $vuelo = $_POST['vuelo'];
            $origen = $_POST['origenVuelo'];
            $destino = $_POST['destinoVuelo'];
            $horario = $_POST['horarioVuelo'];
            $compania = $_POST['companiaVuelo'];
            $db->nuevoVuelo($id, $vuelo, $origen, $destino, $horario, $compania);
        
    
    
}
