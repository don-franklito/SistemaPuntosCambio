<?php
    function conectar() {
        $host = "localhost";
        $user = "root";
        $pass = "";

        $bd = "palabras";

        $con = mysqli_connect($host, $user, $pass);

        mysqli_select_db($con, $bd);

        return $con;
    }
  /*   $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $nameBD = "palabras";
    $conexion = new mysqli($servidor, $usuario, $password, $nameBD);


    if ($conexion->connect_error) {
        die("la conexión ha fallado: " . $conexion->connect_error);
    } */