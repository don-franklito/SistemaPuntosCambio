<?php
include("./cdpalabras/conexion.php");
$con = conectar();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>Puntos de Cambio</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="./css/botones.css">

    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.datatables.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Puntos de Cambio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> Proyectos <span class="sr-only">(current)</span></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paginas/cargarArchivos.php">Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cdpalabras/index.php">Palabras</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--Ejemplo tabla con DataTables-->
    <main class="controunded-3 container-fluid mx-auto bg-light ">
        <div>
            <h3>Puntos De Cambio</h3>
            <div>
                <?php
                if (!isset($_POST['buscar'])) {
                    $_POST['buscar'] = '';
                }
                if (!isset($_POST['APS'])) {
                    $_POST['APS'] = '';
                }
                if (!isset($_POST['estatus'])) {
                    $_POST['estatus'] = '';
                }


                ?>
                <div class=" pl-5  ">
                    <div class=" ">
                        <div class="">
                            <form id="form2" name="form2" method="POST" action="index.php">
                                <div class=" row">
                                    <div class="row ">
                                        <label class=" form-label  pl-2">Buscar</label>
                                        <input type="text" class="w-50 form-control  ml-2" id="buscar" placeholder="Palabra" name="buscar" value="<?php echo $_POST["buscar"] ?>">
                                    </div>

                                    <div class=" row ">
                                        <label class=" form-label pl-2"">APS</label>
                                        <select id="assigned-tutor-filter " id="APS" name="APS" class="w-50  form-control ml-2" style="border: #bababa 1px solid; ">
                                            <?php if ($_POST["APS"] != '') { ?>
                                                <option value="<?php echo $_POST["APS"]; ?>"><?php echo $_POST["APS"]; ?></option>
                                            <?php } ?>
                                            <option value="">Todos</option>
                                            <option value="APS_5">APS5</option>
                                            <option value="APS_6">APS6</option>

                                        </select>

                                        <div class="">
                                            <input type="submit" class="w-100  btn btn-primary1  ml-4" value="Ver"">
                                    </div>
                                </div>

                                <div class=" row ">
                                    <label class=" form-label pl-2"">Estatus</label>
                                            <select id="assigned-tutor-filter " id="estatus" name="estatus" class="w-50 col-8 form-control ml-2" style="border: #bababa 1px solid; ">
                                                <?php if ($_POST["APS"] != '') { ?>
                                                    <option value="<?php echo $_POST["estatus"]; ?>"><?php echo $_POST["status"]; ?></option>
                                                <?php } ?>
                                                <option value="">Todos</option>
                                                <option value="Produccion">Produccion</option>
                                                <option value="En_Proceso">En Proceso</option>
                                                <option value="NO_PRODUCTIVA">NO_PRODUCTIVA</option>
                                            </select>
                                            <div class="">
                                                <input type="submit" class="w-100  btn btn-primary1  ml-4" value="Ver"">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php

                        /*FILTRO de busqueda*/



                        if ($_POST['buscar'] == '') {
                            $_POST['buscar'] = ' ';
                        }
                        $aKeyword = explode(" ", $_POST['buscar']);


                        if ($_POST["buscar"] == '' and $_POST['APS'] == '') {
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

                            if ($_POST["APS"] != '') {
                                $query .= " AND nombre_leng = '" . $_POST['APS'] . "' ";
                            }
                        }


                        $sql = $con->query($query);

                        $numeroSql = mysqli_num_rows($sql);

                        ?>
                        <p class=" text-primary pl-4"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
                            </form>

                            <!-- <style type="text/css">
                            .cabecera {
                                position: sticky;
                                top: 0;
                                z-index: 10;
                            }
                        </style> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">

                <div class="table-responsive h-50 mx-auto ">
                <small> <table id="excel" class="table table-striped table-bordered responsive2 h-50 " cellspacing="0">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>APS</th>
                                <th>Nombre del Componente</th>
                                <th>Descripción</th>
                                <th>Ruta</th>
                                <th>Asignado</th>
                                <th>Estatus</th>
                                <th>Avance Desarollo %</th>
                                <th>Avance Pruebas %</th>
                                <th>Arreglos</th>
                                <th>Rutas</th>
                                <th>Import</th>
                                <th>GeneralesMenu.js</th>
                                <th>Total</th>
                            </tr>
                        </thead>


                        <?php while ($rowSql = $sql->fetch_assoc()) {   ?>

                            <tr>

                                <td class=""><?php echo $rowSql["nombre_pal"]; ?></td>
                                <td class=""><?php echo $rowSql["nombre_leng"]; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>

                        <?php } ?>

                    </table><small>
                </div>
            </div>
        </div>
    </main>

    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="datatables/datatables.min.js"></script>


    <!--Para usar los botones-->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

    <!--Para los estilos en Excel-->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min"></script>

    <!-- <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script> -->



    <script type="text/javascript" src="main.js"></script>


</body>

</html>