<?php
if (!isset($_POST['deleteId'])){
    header('Location: index.php');
}else{
    include 'conexion.php';
    $db = new db();

    $id = $_POST['deleteId'];
    $query = $db->connect->prepare("DELETE FROM vuelos WHERE id_vuelo = ?;");
    $resultado = $query->execute([$id]);
    echo "<script language=JavaScript>alert('Se ha eliminado el vuelo correctamente');</script>";
    header('Location: index.php');
}

?>