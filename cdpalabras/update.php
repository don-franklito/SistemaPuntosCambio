<?php

    include("conexion.php");
    $con = conectar();
   
    if(isset($_GET)) {
        $palabraID = $_GET['id'];
    } else {
        echo "<h2> No trae nada {$_GET}</h2>";
    }
    if(isset($_POST)) {
        $palabraClave = $_POST['palabraClave'];
        $lenguajeID = $_POST['lenguaje']; 
    } else {
        echo "<h2> No trae nada {$_POST}</h2>";
    }

    $conR = 0;
    $sql_val = "SELECT COUNT(id_pal) AS contador FROM palabras p INNER JOIN 
        lenguaje l ON p.fk_id_pal = l.id_leng
        WHERE nombre_pal = '{$palabraClave}' AND fk_id_pal = $lenguajeID";

    $val = mysqli_query($con, $sql_val);
    while($row = mysqli_fetch_assoc($val)) {
        $conR = $row["contador"];
    } 

    $conSR = 0;
    $sql_valSR = "SELECT COUNT(id_pal) AS contador FROM palabras 
        WHERE nombre_pal = '{$palabraClave}' AND fk_id_pal = $lenguajeID AND id_pal = $palabraID";
    $valSR = mysqli_query($con, $sql_valSR);
    while($row = mysqli_fetch_assoc($valSR)) {
        $conSR = $row["contador"];
    } 
   

    if($conR > 0 && $conSR = 1) {
        Header("Location: index.php?mensaje=7");
    } else {
        $sql="UPDATE palabras SET nombre_pal='$palabraClave', fk_id_pal=$lenguajeID WHERE id_pal=$palabraID";
        $query = mysqli_query($con, $sql);
        if( mysqli_affected_rows($con)>0){
            Header("Location: index.php?mensaje=2");
         }else{
             Header("Location: index.php");
         }
    } 
?>