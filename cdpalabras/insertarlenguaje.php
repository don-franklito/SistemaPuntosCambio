<?php 
    include("conexion.php"); 
    $con = conectar();

    if(isset($_POST)) {
        $nombreLenguaje = $_POST['nombreLenguaje'];
    } else {
        echo "<h2> No trae nada {$_POST}</h2>";
    }
    echo $nombreLenguaje;
    $conR = 0;
    $sql_val = "SELECT COUNT(id_leng) as contador FROM lenguaje WHERE nombre_leng = '{$nombreLenguaje}'";
    $val = mysqli_query($con, $sql_val);

    echo '<br>'.$sql_val;

    while($row = mysqli_fetch_assoc($val)) {
        $conR = $row["contador"];
    } 

    echo $conR;

    if($conR > 0) {
        Header("Location: index.php?mensaje=4");
    } else {
        $sql = "INSERT INTO lenguaje VALUES ('','{$nombreLenguaje}', '')";
        $query = mysqli_query($con, $sql);
        Header("Location: index.php?mensaje=6");
    }
    
?>