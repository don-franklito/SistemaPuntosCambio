<?php
    function buscarMultiplesPalabrasTabla($nombreCarpeta) {
        $palabras = array(
            "if",
            "for",
            "cout",
            "while"    );
        if (is_dir($nombreCarpeta)) {
            if ($dh = opendir($nombreCarpeta)) {
                echo "<table border='1'>";
                echo "<tr><th>Nombre Archivo</th>";
                foreach ($palabras as $palabra) {
                    echo "<th>" . $palabra . "</th>";
                }
                echo "</tr>";
                while (($archivo = readdir($dh)) !== false) {
                    if ($archivo != "." && $archivo != "..") {
                        $nombreArchivo = basename($nombreCarpeta . "/" . $archivo);
                        $contenido = file_get_contents($nombreCarpeta . "/" . $archivo);
                        $result = array_fill_keys($palabras, 0);
                        foreach ($palabras as $palabra) {
                            $result[$palabra] = substr_count($contenido, $palabra);
                        }
                        echo "<tr><td>" . $nombreArchivo . "</td>";
                        foreach ($result as $palabra => $count) {
                            echo "<td>" . $count . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</table>";
                closedir($dh);
            }
        }
    }
    buscarMultiplesPalabrasTabla('C:/xampp/htdocs/crudpalabras/jvh-crud');
?>