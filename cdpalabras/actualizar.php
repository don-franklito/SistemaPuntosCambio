<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM palabras p INNER JOIN lenguaje l ON p.fk_id_pal = l.id_leng WHERE id_pal = '$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$len = "SELECT * FROM lenguaje";

$sql2 = $con->query($len);
$numeroSql2 = mysqli_num_rows($sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar</title>
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="../js/alertas.notie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
            <h4 class="text-white">Puntos de Cambio</h4>

        </nav>
    </header>

    <div class="container mt-5 d-flex justify-content-center">
        <form class="justify-content-around" action="update.php?id=<?= $id ?>" onsubmit=" alertaActualizar();return false" method="POST">
            <div>
                <input type="text" class="form-control mb-3 " name="palabraClave" value="<?php echo $row['nombre_pal']  ?>">
                <select name="lenguaje" id="lenguaje" class="form-control mb-3 ">

                    <?php while ($fila = $sql2->fetch_assoc()) : ?>
                        <option class="w-50" value="<?= $fila['id_leng'] ?>"><?= $fila['nombre_leng'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div>
                <input type="submit" class=" btn btn-primary btn-block" value="Actualizar">
                <a class="w-100 mt-3 btn btn-primary btn-bloc" href="index.php">Regresar</a>
            </div>

        </form>

    </div>
</body>

</html>