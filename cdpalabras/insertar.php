 <?php
      include("conexion.php"); 
 
      $con = conectar();
      if(isset($_POST)) {
            $palabraClave = $_POST['palabraClave'];
            $lenguajeID = $_POST['lenguaje']; 
      } else {
            echo "<h2> No trae nada {$_POST}</h2>";
      }

      $conR = 0;
      $sql_val = "SELECT COUNT(id_pal) AS contador FROM palabras WHERE nombre_pal = '{$palabraClave}' AND fk_id_pal = $lenguajeID";
      $val = mysqli_query($con, $sql_val);
      
      while($row = mysqli_fetch_assoc($val)) {
            $conR = $row["contador"];
      } 

      if($conR > 0) {
            Header("Location: index.php?mensaje=5");
      } else {
            $sql = "INSERT INTO palabras VALUES ('','{$palabraClave}', '{$lenguajeID}')";
            $query = mysqli_query($con, $sql);
            Header("Location: index.php?mensaje=1");
      }

?>
