<?php require "FechaFormato.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Clonar fechas</title>
</head>
<body>
<h1>Clonar fechas</h1>
<?php
$fecha1 = new FechaFormato("12/20/2019");
$fecha2 = clone $fecha1;
$fecha2->modify("+2 weeks");
print $fecha1."<br>";
print $fecha2."<br>";
print "<hr>";
$fecha3 = new DateTimeImmutable("01/10/2018");
$fecha4 = $fecha3->modify("+1 year");
print $fecha3->format("Y-m-d")."<br>";
print $fecha4->format("Y-m-d")."<br>";
print "<hr>";

?>
</body>
</html>