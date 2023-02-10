<?php
include("./cdpalabras/conexion.php");
$con = conectar();
$sql = "SELECT *  FROM aps";
$rec3 = mysqli_query($con, $sql);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>Puntos de Cambio</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/botones.css">

    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.datatables.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        div.dataTables_wrapper div.dataTables_filter label {
            font-weight: normal;
            white-space: nowrap;
            text-align: right;
            visibility: hidden
        }

        div.dataTables_wrapper div.dataTables_length label {
            font-weight: normal;
            text-align: left;
            white-space: nowrap;
            visibility: hidden
        }

        .container {
            padding: 15px;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            gap: 5px;
            flex-wrap: nowrap;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1280px;
            }
        }
    </style>
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
    <main class="container bg-light ">
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
                <div class="">
                    <div class=" ">
                        <div class="">
                            <form id="form2" name="form2" method="POST" action="index.php">
                                <div class="col-sm-12 row">
                                    <div class="col-3 row">
                                        <input type="text" class="w-100 form-control" id="buscar" placeholder="Palabra" name="buscar" value="<?php echo $_POST["buscar"] ?>">
                                    </div>

                                    <div class=" col-3 row ">

                                        <select id=" assigned-tutor-filter " id=" APS" name="APS" class="w-75  form-control" style="border: #bababa 1px solid; ">
                                            <?php if ($_POST["APS"] != '') { ?>
                                                <option value="<?php echo $_POST["APS"]; ?>"><?php echo $_POST["APS"]; ?></option>
                                            <?php } ?>
                                            <option value="">Todos</option>
                                            <?php while ($fila3 = $rec3->fetch_assoc()) : ?>
                                                <option value="<?= $fila3['nombre_aps'] ?>"><?= $fila3['nombre_aps'] ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                        <input type="submit" class="w-25  btn btn-primary1" value="Ver">
                                    </div>

                                    <div class=" col-3 row ">

                                        <select id="assigned-tutor-filter " id="estatus" name="estatus" class="w-75 form-control" style="border: #bababa 1px solid; ">
                                            <?php if ($_POST["estatus"] != '') { ?>
                                                <option value="<?php echo $_POST["estatus"]; ?>"><?php echo $_POST["estatus"]; ?></option>
                                            <?php } ?>
                                            <option value="">Todos</option>
                                            <option value="Produccion">Produccion</option>
                                            <option value="En Proceso">En Proceso</option>
                                            <option value="NO PRODUCTIVA">NO PRODUCTIVA</option>
                                        </select>

                                        <input type="submit" class="w-25  btn btn-primary1" value="Ver">

                                    </div>
                                </div>
                        </div>



                        <?php

                        /*FILTRO de busqueda*/



                        if ($_POST['buscar'] == '') {
                            $_POST['buscar'] = ' ';
                        }
                        $aKeyword = explode(" ", $_POST['buscar']);


                        if ($_POST["buscar"] == '' and $_POST['APS'] == '' and $_POST['estatus'] == '') {
                            $query = "SELECT  id_pdc AS ID, a.nombre_aps AS APS, s.url_sis AS URL, p.descripcion_pdc AS Descripcion, s.estatus_sis AS Estatus, p.total_pdc AS PuntosCambio, p.aprobados_pdc AS PuntosCambioAprobados, p.resuelto_pdc AS PuntosCambioResueltos, p.lineas_pdc AS LineasPuntosCambio FROM pdc p INNER JOIN sistema s ON p.fk_id_sis_pdc = s.id_sis INNER JOIN aps a ON s.fk_folio_aps = a.folio";
                        } else {


                            $query =  "SELECT * FROM pdc p INNER JOIN sistema s ON p.fk_id_sis_pdc = s.id_sis INNER JOIN aps a ON s.fk_folio_aps = a.folio";

                            if ($_POST["buscar"] != '') {
                                $query .= " WHERE (id_pdc LIKE LOWER('%" . $aKeyword[0] . "%') 
                                            OR a.nombre_aps LIKE LOWER('%" . $aKeyword[0] . "%') 
                                            OR s.url_sis LIKE LOWER('%" . $aKeyword[0] . "%')
                                            OR p.descripcion_pdc LIKE LOWER('%" . $aKeyword[0] . "%') 
                                            OR s.estatus_sis LIKE LOWER('%" . $aKeyword[0] . "%')
                                            OR p.total_pdc LIKE LOWER('%" . $aKeyword[0] . "%')
                                            OR p.aprobados_pdc LIKE LOWER('%" . $aKeyword[0] . "%')
                                            OR p.resuelto_pdc LIKE LOWER('%" . $aKeyword[0] . "%')
                                            OR p.lineas_pdc LIKE LOWER('%" . $aKeyword[0] . "%')) ";

                                for ($i = 1; $i < count($aKeyword); $i++) {
                                    if (!empty($aKeyword[$i])) {
                                        $query .= " OR id_pdc LIKE '%" . $aKeyword[$i] . "%' OR a.nombre_aps LIKE '%" . $aKeyword[$i] . "%'
                                                    OR s.url_sis LIKE '%" . $aKeyword[$i] . "%' OR p.descripcion_pdc LIKE '%" . $aKeyword[$i] . "%'
                                                    OR s.estatus_sis LIKE '%" . $aKeyword[$i] . "%' OR p.total_pdc LIKE '%" . $aKeyword[$i] . "%'
                                                    OR p.aprobados_pdc LIKE '%" . $aKeyword[$i] . "%' OR p.resuelto_pdc LIKE '%" . $aKeyword[$i]
                                            . "%' OR p.lineas_pdc LIKE '%" . $aKeyword[$i] . "%'";
                                    }
                                }
                            }

                            if ($_POST["APS"] != '') {
                                $query .= "AND a.nombre_aps = '" . $_POST['APS'] . "' ";
                            }
                            if ($_POST["estatus"] != '') {
                                $query .= "AND s.estatus_sis = '" . $_POST['estatus'] . "' ";
                            }
                        }


                        $sql = $con->query($query);

                        $numeroSql = mysqli_num_rows($sql);

                        ?>
                        <p class=" text-primary"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
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

            <div class="col-lg-12 h-75">

                <div class="table-responsive h-75 mx-auto ">
                    <small>
                        <table id="excel" class="table table-striped table-bordered responsive2 h-50 " cellspacing="0">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>APS</th>
                                    <th>Descripción</th>
                                    <th>Ruta</th>
                                    <th>Asignado</th>
                                    <th>Estatus</th>
                                    <th>AD%</th>
                                    <th>AP%</th>
                                    <th>PC</th>
                                    <th>PCR</th>
                                    <th>PCP</th>
                                    <th>LPC</th>
                                </tr>
                            </thead>


                            <?php while ($rowSql = $sql->fetch_assoc()) {   ?>

                                <tr>

                                    <td class=""><?php echo $rowSql["id_pdc"]; ?></td>
                                    <td class=""><?php echo $rowSql["nombre_aps"]; ?></td>
                                    <td class=""><?php echo $rowSql["descripcion_pdc"]; ?></td>
                                    <td class=""><?php echo $rowSql["url_sis"]; ?></td>
                                    <td></td>
                                    <td class=""><?php echo $rowSql["estatus_sis"]; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td class=""><?php echo $rowSql["total_pdc"]; ?></td>
                                    <td class=""><?php echo $rowSql["resuelto_pdc"]; ?></td>
                                    <td class=""><?php echo $rowSql["aprobados_pdc"]; ?></td>
                                    <td class=""><?php echo $rowSql["lineas_pdc"]; ?></td>
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