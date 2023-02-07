<?php
    function conectar() {
        $host = "localhost";
        $user = "root";
        $pass = "";

        $bd = "sistema_versiones";

        $con = mysqli_connect($host, $user, $pass);

        mysqli_select_db($con, $bd);

        return $con;
    }
  