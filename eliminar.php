<?php
if (!isset($_POST['deleteId'])){
    header('Location: index.php');
}else{
    include 'conexion.php';
    $db = new db();

    $id = $_POST['deleteId'];
    $db->eliminarVuelo($id);
}

?>