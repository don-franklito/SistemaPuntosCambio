<?php 

$path_completo = $_FILES['envioarchivos']['name'];
$path_completo = str_replace('.zip', '', $path_completo);

$ruta = $_FILES['envioarchivos']["tmp_name"];

// Función descomprimir 
$zip = new ZipArchive;
if ($zip->open($ruta) === TRUE) {
    //función para extraer el ZIP
    $extraido = $zip->extractTo('uploads/');
    
    $zip->close();

    $dir = opendir('uploads/'.$path_completo);
    buscarMultiplesPalabrasTabla('uploads/'.$path_completo);
}
else {

}


$arr = array();
function buscarMultiplesPalabrasTabla($nombreCarpeta) {

    $palabras= array(
        "if",
        "for",
        "while"
    );

    global $resultados;

    if (is_dir($nombreCarpeta)) {
        if ($dh = opendir($nombreCarpeta)) {
            while (($archivo = readdir($dh)) ) {
                if($archivo != "." && $archivo != "..") {
                    $rutaArchivo = $nombreCarpeta."/".$archivo;
                    $contenido = file_get_contents($rutaArchivo);
                    $result = array_fill_keys($palabras, 0);
                    foreach ($palabras as $palabra) {
                        $result[$palabra] = substr_count($contenido, $palabra);
                    }
                   $resultados[] = array(
                        'archivo' => $rutaArchivo,
                        'resultados' => $result
                    );
                }
            }
            closedir($dh);
        }
    }
}

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
                        <a class="nav-link" href="vulnerabilidades.php">Vulnerabilidades</a>
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
    
    <div class="container bg-light rounded p-5 "><h3>Puntos De Cambio</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="excel" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>APS</th>
                                <th>Nombre archivo</th>
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
                            <?php 
                                foreach($resultados as $value){
                                    echo "<tr>";
                                    echo "<td>prueba</td>";
                                    echo "<td>prueba2</td>";
                                    echo "<td>".$value['archivo']."</td>";
                                    echo "<td>pruebadescripcion</td>";
                                    echo "<td>".$value['archivo']."</td>";
                                    echo "<td>prueba asignado</td>";
                                    echo "<td>prueba estatus</td>";
                                    echo "<td>prueba avance</td>";
                                    echo "<td>prueba avance pruebas</td>";
                                    echo "<td>prueba arreglos</td>";
                                    echo "<td>prueba rutas</td>";
                                    echo "<td>prueba import</td>";
                                    echo "<td>prueba generakes</td>";
                                    echo "<td>prueba total</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


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