<?php
    include 'conexion.php';
    $db = new db();
    session_start();
    if(!isset($_SESSION['nombre'])){
        exit();
    }
    else{
        try{
            $id = $_POST['idVuelo'];
            $vuelo = $_POST['vuelo'];
            $origen = $_POST['origenVuelo'];
            $destino = $_POST['destinoVuelo'];
            $horario = $_POST['horarioVuelo'];
            $compania = $_POST['companiaVuelo'];
            $query = $db->connect->prepare("SELECT id_vuelo FROM vuelos WHERE id_vuelo = ?");
            $result = $query->execute([$id]);
            $vueloResultado = $query->fetchAll(PDO::FETCH_OBJ);
            if(array_count_values($usuarioResultado) >= 1){
                
                header('Location: index.php');
                echo "<script language=JavaScript>alert('El ID introducido ya está en uso');</script>";
            }
            $query = $db->connect->prepare("INSERT INTO vuelos(id_vuelo, vuelo, origen, destino, horario, compañia) VALUES(?,?,?,?,?,?);");
            $result = $query->execute([$id, $vuelo, $origen, $destino, $horario, $compania]);
            echo "<script language=JavaScript>alert('El vuelo se ha añadido correctamente');</script>";
            header('Location: index.php');
            
        }catch(Exception $e){
            header('Location: index.php');
            throw new Exception("Error, comprueba de nuevo los datos", 1);
            echo "<script language=JavaScript>alert('Ha ocurrido un error y no se ha creado el vuelo, intentelo de nuevo.');</script>";
            
        }
        
    
    
}
