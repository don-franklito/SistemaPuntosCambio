<?php

    include("conexion.php");
    $con = conectar();

    $palabraID = $_GET['id'];

    $sql="DELETE FROM palabras  WHERE id_pal = '$palabraID'";
    $query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php?mensaje=3");
    }

