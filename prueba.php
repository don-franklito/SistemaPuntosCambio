<?php 
    /* phpinfo(); */
    /* echo "<pre> ";
    print_r(get_defined_vars());
    echo "</pre>"; */

    /* $dir_subida = 'uploads/';
    $fichero_subido = $dir_subida . basename($_FILES['envioarchivos']['name']); echo '<pre>';
    if (move_uploaded_file($_FILES['envioarchivos']['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.\n";
    } else {
        echo "¡Posible ataque de subida de ficheros!\n";
    } */

   /*  $path = "uploads/jvh-crud"; */
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
        /* Borrar carpetas y zip */
        
        // Leo todos los ficheros de la carpeta    
        /* while ($elemento = readdir($dir)) {
                // Tratamos los elementos . y .. que tienen todas las carpetas        
            if( $elemento != "." && $elemento != "..") { // Si es una carpeta            
                if( is_dir($path_completo.$elemento) ){// Muestro la carpeta               
                    echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";// Si es un fichero            
                } else {// Muestro el fichero                
                    echo "<br />". $elemento;
                    
                }
            }
        }  */
    }
    else {

    }

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
    
?>