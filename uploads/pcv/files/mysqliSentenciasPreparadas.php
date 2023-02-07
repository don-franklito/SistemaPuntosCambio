<?php
$conn = new mysqli("localhost", "root", "", "quiz");

if ($conn->connect_errno) {
  die("error en la conexión");
}

//1. Preparar
$sql = "SELECT * FROM preguntas WHERE examen = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
  die("Error en la preparación");
}

//2. Ligado o el bind
//s cadena
//i entero
//d doble
//b binario
$examen = "GEO01";

$ligado = $stmt->bind_param("s",$examen);
if (!$ligado) {
  die("Error en el ligado de parametros");
}

//3. Ejecución 
$resultado = $stmt->execute();
if (!$resultado) {
  die("Error en la ejecucion");
}

//4. Recuperamos los datos
$stmt->bind_result($id, $pregunta, $op1, $op2, $op3, $op4, $buena, $examen);

//5. resultado
while ($stmt->fetch()) {
  print "id: ".$id." ".$pregunta."<br>";
}

//6. Liberar recursos
$stmt->free_result();
$stmt->close();
$conn->close();


?>