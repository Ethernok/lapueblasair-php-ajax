<?php
    session_start();
    include_once 'conexion.php';
    $db = new db();
    print_r($_POST);
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $sql = $db->connect->prepare('SELECT * FROM usuarios WHERE usuario = ? AND clave = ?;');
    $sql->execute([$user, $pass]);
    $result = $sql->fetch(PDO::FETCH_OBJ);

    if(!$result){
        header('Location: login.php');
    }elseif($sql->rowCount() >= 1){
        $_SESSION['nombre'] = $result->nombre;
        header('Location: index.php');
        
    }
    
?>