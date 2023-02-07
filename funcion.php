<?php
function buscarPalabraArray($nombreCarpeta) {
    
    $palabras= array(
        "if",
        "for",
        "while");

    if (is_dir($nombreCarpeta)) {
        if ($dh = opendir($nombreCarpeta)) {
            $resultados = array();
            while (($archivo = readdir($dh)) !== false) {
                if($archivo != "." && $archivo != "..") {
                    $rutaArchivo = $nombreCarpeta."/".$archivo;
                    $contenido = file_get_contents($rutaArchivo);
                    $result = array_fill_keys($palabras, 0);
                    foreach ($palabras as $palabra) {
                        $result[$palabra] = substr_count($contenido, $palabra);
                    }
                    $resultados[$rutaArchivo] = $result;
                }
            }
            closedir($dh);
            return $resultados;
        }
    }
}
$resultados = buscarPalabraArray('C:/xampp/htdocs/crudpalabras/jvh-crud');
var_dump($resultados);
?>
