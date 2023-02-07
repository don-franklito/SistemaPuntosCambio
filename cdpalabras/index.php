<?php
include("conexion.php");


$con = conectar();

$sql = "SELECT * FROM palabras p INNER JOIN lenguaje l ON p.fk_id_pal = l.id_leng";

$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

$len = "SELECT * FROM lenguaje";
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
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="/PC/SistemaPuntosCambio/css/menu.css">
    <link rel="stylesheet" href="../css/plugins/notie.min.css">
    <link rel="stylesheet" href="../css/botones.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/plugins/notie.min.js"></script>
    <script src="../js/alertas.notie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body class=" mt-xl-5 pt-5 ">
    <header>
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top ">
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

    <?php

    if (!isset($_POST['palabraClave'])) {
        $_POST['palabraClave'] = '';
    }
    if (!isset($_POST['lenguaje'])) {
        $_POST['lenguaje'] = '';
    }

    ?>

    <div class=" rounded-3 container p-5 bg-light mx-auto">
        <div class="row ">
            <div class="col-sm-4 pl-5 ">
                <h6>¿No encuentras la palabra en el listado? Agregala aquí</h6>
                <form action="insertar.php" class="w-100" value="lenguaje" method="POST">
                    <input type="text" class="form-control mb-3" autofocus required placeholder="Palabra" name="palabraClave" id="palabraClave" value="<?php echo $_POST["palabraClave"] ?>">
                    <select name="lenguaje" id="lenguaje" class="form-select" value="<?php echo $_POST["lenguaje"] ?>">
                        <?php while ($fila = $rec->fetch_assoc()) : ?>
                            <option value="<?= $fila['id_leng'] ?>"><?= $fila['nombre_leng'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                    <input type="submit" class="btn btn-primary1" value="Guardar">
                </form>

                <br>
                <div class="content">
                    <h6>¿No encuentras el lenguaje en el listado? Agregalo aquí</h6>
                    <form action="insertarlenguaje.php" class="w-100" method="POST">
                        <input type="text" name="nombreLenguaje" id="nombreLenguaje" class="form-control mb-3" autofocus required placeholder="Lenguaje">
                        <input type="submit" class="btn btn-primary1" value="Guardar">
                    </form>
                </div>
            </div>
            <?php

            if (isset($_GET['mensaje']) && $_GET['mensaje'] == 1) {
                unset($_GET['mensaje']);
                //header("Location: index.php");
                echo "<script>alertas(1);</script>";
            } else if (isset($_GET['mensaje']) && $_GET['mensaje'] == 2) {
                echo "<script>alertas(2);</script>";
            } else if (isset($_GET['mensaje']) && $_GET['mensaje'] == 3) {
                echo "<script>alertas(3);</script>";
            } else if (isset($_GET['mensaje']) && $_GET['mensaje'] == 4) {
                unset($_GET['mensaje']);
                echo "<script>alertas(4);</script>";
            } else if (isset($_GET['mensaje']) && $_GET['mensaje'] == 5) {
                unset($_GET['mensaje']);
                echo "<script>alertas(5);</script>";
            } else if (isset($_GET['mensaje']) && $_GET['mensaje'] == 6) {
                unset($_GET['mensaje']);
                echo "<script>alertas(6);</script>";
            } else if (isset($_GET['mensaje']) && $_GET['mensaje'] == 7) {
                unset($_GET['mensaje']);
                echo "<script>alertas(7);</script>";
            }





            if (!isset($_POST['buscar'])) {
                $_POST['buscar'] = '';
            }
            if (!isset($_POST['buscarLenguaje'])) {
                $_POST['buscarLenguaje'] = '';
            }


            ?>

            <div class="col-sm-8 pl-5  ">
                <div class="col-12 grid-margin">
                    <div class="">
                        <div class="card-body">

                            <form id="form2" name="form2" method="POST" action="index.php">
                                <div class="col-12 row">

                                    <div class="col-sm-6">
                                        <label class=" form-label  pl-2">Palabra a buscar</label>
                                        <input type="text" class="w-50 form-control  ml-2" id="buscar" placeholder="Palabra" name="buscar" value="<?php echo $_POST["buscar"] ?>">
                                    </div>

                                    <div class=" row col-sm-6">

                                        <label class=" form-label">Lenguajes</label>
                                        <select id="assigned-tutor-filter" id="buscarLenguaje" name="buscarLenguaje" class="w-50 col-8 form-control " style="border: #bababa 1px solid; ">
                                            <?php if ($_POST["buscarLenguaje"] != '') { ?>
                                                <option value="<?php echo $_POST["buscarLenguaje"]; ?>"><?php echo $_POST["buscarLenguaje"]; ?></option>
                                            <?php } ?>
                                            <option value="">Todos</option>
                                            <option value="Java">Java</option>
                                            <option value="Javascript">Javascript</option>
                                            <option value="Python">Python</option>
                                            <option value="C++">C++</option>
                                            <option value="C#">C#</option>
                                        </select>
                                        <div class="col-4">
                                            <input type="submit" class="w-100  btn btn-primary1  ml-4" value="Ver"">
                                        </div>

                                    </div>


                                   
                                </div>


                                <?php

                                /*FILTRO de busqueda*/



                                if ($_POST['buscar'] == '') {
                                    $_POST['buscar'] = ' ';
                                }
                                $aKeyword = explode(" ", $_POST['buscar']);


                                if ($_POST["buscar"] == '' and $_POST['buscarLenguaje'] == '') {
                                    $query = "SELECT * FROM palabras AS p  JOIN lenguaje AS l ON p.fk_id_pal = l.id_leng ";
                                } else {


                                    $query =  "SELECT * FROM palabras AS p JOIN lenguaje AS l ON p.fk_id_pal = l.id_leng";

                                    if ($_POST["buscar"] != '') {
                                        $query .= " WHERE (nombre_pal LIKE LOWER('%" . $aKeyword[0] . "%') OR nombre_leng LIKE LOWER('%" . $aKeyword[0] . "%')) ";

                                        for ($i = 1; $i < count($aKeyword); $i++) {
                                            if (!empty($aKeyword[$i])) {
                                                $query .= " OR nombre_pal LIKE '%" . $aKeyword[$i] . "%' OR nombre_leng LIKE '%" . $aKeyword[$i] . "%'";
                                            }
                                        }
                                    }

                                    if ($_POST["buscarLenguaje"] != '') {
                                        $query .= " AND nombre_leng = '" . $_POST['buscarLenguaje'] . "' ";
                                    }
                                }


                                $sql = $con->query($query);

                                $numeroSql = mysqli_num_rows($sql);

                                ?>
                                <p class=" text-primary pl-4"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
                            </form>

                            <style type="text/css">
                                .cabecera {
                                    position: sticky;
                                    top: 0;
                                    z-index: 10;
                                    }

                            </style>


                            <div class="table-responsive container w-100 ">
                                <table class="table ">
                                    <thead>
                                        <tr class="">

                                            <th class="bg-primary cabecera" style=" text-align: center;"> Palabras </th>
                                            <th class="bg-primary cabecera" style=" text-align: center;"> Lenguaje </th>
                                            <th class="bg-primary cabecera" style=" text-align: center;"> Acciones </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php while ($rowSql = $sql->fetch_assoc()) {   ?>

                                            <tr>

                                                <td style="text-align: center;" class=""><?php echo $rowSql["nombre_pal"]; ?></td>
                                                <td style="text-align: center;" class=""><?php echo $rowSql["nombre_leng"]; ?></td>
                                                <td class="border border-0 d-flex justify-content-around mb-3">
                                                    <a class="btn btn-edit btn-bloc text-light " href="actualizar.php?id=<?php echo $rowSql['id_pal'] ?>&idleng=<?php echo $rowSql['id_leng'] ?>" class=" text-success">Editar</a>
                                                    <a onclick=" return confirmar();" class="btn btn-delete btn-bloc text-light text-danger" href="delete.php?id=<?php echo $rowSql['id_pal'] ?>">Eliminar</a>

                                                </td>


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