<?php
include 'conexion.php';
$db = new db();
session_start();
if(!isset($_SESSION['nombre'])){
    exit();
}
else{
    try{
        $id = $_POST['editId'];
        $vuelo = $_POST['editVuelo'];
        $origen = $_POST['editOrigenVuelo'];
        $destino = $_POST['editDestinoVuelo'];
        $horario = $_POST['editHorarioVuelo'];
        $compania = $_POST['editCompaniaVuelo'];
        $query = $db->connect->prepare("UPDATE vuelos SET id_vuelo = ?, vuelo = ?, origen = ?, destino = ?, horario = ?, compañia = ? WHERE id_vuelo = ? ;");
        $result = $query->execute([$id, $vuelo, $origen, $destino, $horario, $compania, $id]);
        if($result){  
            echo "<script language=JavaScript>alert('El vuelo se ha actualizado correctamente');</script>";
            header('Location: index.php');

        }
        else{
            echo "<script language=JavaScript>alert('Ha ocurrido un error, compruebe los datos e inténtelo de nuevo');</script>";
            header('Location: index.php');
    }
    }catch(Exception $e){
        header('Location: index.php');
        echo "<script language=JavaScript>alert('Ha ocurrido un error, compruebe los datos e inténtelo de nuevo');</script>";
        throw new Exception("Error, comprueba de nuevo los datos", 1);
    }
    
}
