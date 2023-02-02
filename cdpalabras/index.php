<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT * FROM palabras p INNER JOIN lenguajes l ON p.Lenguaje_ID = l.Lenguaje_ID";

$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$len = "SELECT * FROM lenguajes";
$rec = mysqli_query($con, $len);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Puntos de Cambio </title>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Css styles -->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../main.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Puntos de Cambio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php"> Proyectos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../paginas/cargarArchivos.php">Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Palabras</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h2>Agregar palabra</h2>
                <form action="insertar.php" method="POST">
                    <input type="text" class="form-control mb-3" placeholder="Palabra" name="palabraClave" id="palabraClave">
                    <select name="lenguaje" id="lenguaje" class="form-select">
                        <?php while ($fila = $rec->fetch_assoc()) : ?>
                            <option value="<?= $fila['Lenguaje_ID'] ?>"><?= $fila['Lenguaje_Nombre'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>


            // Tabla con Filtro


            <?php

            $servidor = "localhost";
            $usuario = "root";
            $password = "";
            $nameBD = "palabras";
            $conexion = new mysqli($servidor, $usuario, $password, $nameBD);
            if ($conexion->connect_error) {
                die("la conexión ha fallado: " . $conexion->connect_error);
            }


            if (!isset($_POST['buscar'])) {
                $_POST['buscar'] = '';
            }
            if (!isset($_POST['buscarLenguaje'])) {
                $_POST['buscarLenguaje'] = '';
            }



            ?>




            <div class="container mt-5">
                <div class="col-12">



                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Buscador</h4>


                                    <form id="form2" name="form2" method="POST" action="index.php">
                                        <div class="col-12 row">

                                            <div class="mb-3">
                                                <label class="form-label">Palabra a buscar</label>
                                                <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>">
                                            </div>

                                            <h4 class="card-title">Filtro de búsqueda</h4>

                                            <div class="col-11">

                                                <table class="table">
                                                    <thead>
                                                        <tr class="filters">
                                                            <th>
                                                                Lenguaje
                                                                <select id="assigned-tutor-filter" id="buscarLenguaje" name="buscarLenguaje" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;">
                                                                    <?php if ($_POST["buscarLenguaje"] != '') { ?>
                                                                        <option value="<?php echo $_POST["buscarLenguaje"]; ?>"><?php echo $_POST["buscarLenguaje"]; ?></option>
                                                                    <?php } ?>
                                                                    <option value="">Todos</option>
                                                                    <option value="Java">Java</option>
                                                                    <option value="Javascript">Javascript</option>
                                                                    <option value="Phyton">Python</option>
                                                                </select>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>


                                            <div class="col-1">
                                                <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: purple; color: white;">
                                            </div>
                                        </div>


                                        <?php
                                        /*FILTRO de busqueda////////////////////////////////////////////*/
                                        if ($_POST['buscar'] == '') {
                                            $_POST['buscar'] = ' ';
                                        }
                                        $aKeyword = explode(" ", $_POST['buscar']);


                                        if ($_POST["buscar"] == '' and $_POST['buscarLenguaje'] == '') {
                                            $query = "SELECT * FROM palabras AS p  JOIN lenguajes AS l ON p.Lenguaje_ID = l.Lenguaje_ID ";
                                        } else {


                                            $query =  "SELECT * FROM palabras AS p JOIN lenguajes AS l ON p.Lenguaje_ID = l.Lenguaje_ID ";

                                            if ($_POST["buscar"] != '') {
                                                $query .= " WHERE (Palabra_Nombre LIKE LOWER('%" . $aKeyword[0] . "%') OR Lenguaje_Nombre LIKE LOWER('%" . $aKeyword[0] . "%')) ";

                                                for ($i = 1; $i < count($aKeyword); $i++) {
                                                    if (!empty($aKeyword[$i])) {
                                                        $query .= " OR Palabra_Nombre LIKE '%" . $aKeyword[$i] . "%' OR Lenguaje_Nombre LIKE '%" . $aKeyword[$i] . "%'";
                                                    }
                                                }
                                            }

                                            if ($_POST["buscarLenguaje"] != '') {
                                                $query .= " AND Lenguaje_Nombre = '" . $_POST['buscarLenguaje'] . "' ";
                                            }
                                        }


                                        $sql = $conexion->query($query);

                                        $numeroSql = mysqli_num_rows($sql);

                                        ?>
                                        <p style="font-weight: bold; color:purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
                                    </form>


                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="background-color:purple; color:#FFFFFF;">
                                                    <th style=" text-align: center;"> Palabras </th>
                                                    <th style=" text-align: center;"> Lenguaje </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($rowSql = $sql->fetch_assoc()) {   ?>

                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $rowSql["Lenguaje_Nombre"]; ?></td>
                                                        <td style="text-align: center;"><?php echo $rowSql["Palabra_Nombre"]; ?></td>

                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>











            //Tabla sin filtro




            <div class="col-md-8">
                <table id="example" class="table table-striped " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Lenguaje</th>
                            <th>Palabra</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $row['Lenguaje_Nombre'] ?></td>
                                <td><?php echo $row['Palabra_Nombre'] ?></td>
                                <td class="col-md-1"><a href="actualizar.php?id=<?php echo $row['Palabras_ID'] ?>" class="text-success"><i class="bi bi-pencil-square"></i< /a>
                                </td>
                                <td class="col-md-1"><a href="delete.php?id=<?php echo $row['Palabras_ID'] ?>" class="text-danger"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <script src="../datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="../main.js"></script>

</body>

</html>