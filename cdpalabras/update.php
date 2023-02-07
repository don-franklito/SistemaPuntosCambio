<?php

    include("conexion.php");
    $con = conectar();

    $palabraID = $_GET['id'];
    $palabraClave = $_POST['palabraClave'];
    $lenguajeID = $_POST['lenguaje'];

    $sql="UPDATE palabras SET nombre_pal='$palabraClave', fk_id_pal=$lenguajeID WHERE id_pal=$palabraID";

    //echo $sql;
    //$sqlu = "UPDATE palabras SET Palabra_Nombre='$palabraClave', Lenguaje_ID='$lenguajeID' WHERE Palabras_ID='$palabraID'";
    $query = mysqli_query($con,$sql);

    if( mysqli_affected_rows($con)>0){
       Header("Location: index.php?mensaje=2");
    }else{
        Header("Location: index.php");
    }
