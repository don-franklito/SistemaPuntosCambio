<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title> Sistema Asistente de Versiones </title>
</head>
<body>
    <nav class="navbar bg-body-tertiary" data-bs-theme="dark">  
        <div class="container-fluid">        
            <a class="navbar-brand" href="#">    
                <h4> Asistente de Versiones <i class="fa-solid fa-code-compare"></i> </h4>
                <a href="index.php"> Regresar </a>
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5 ">
            <div class="col-md-12">
                <div class="card">  
                    <?php   

                        $file = $_FILES["fileTest"]["name"]; //Nombre de nuestro archivo

                        $validator = 1; //Variable validadora

                        $file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION)); //Extensión de nuestro archivo

                        $url_temp = $_FILES["fileTest"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

                        //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
                        $url_insert = dirname(__FILE__) . "/files"; //Carpeta donde subiremos nuestros archivos

                        //Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
                        $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

                        //Si la carpeta no existe, la creamos
                        if (!file_exists($url_insert)) {
                            mkdir($url_insert, 0777, true);
                        };

                        //Validamos el tamaño del archivo
                        $file_size = $_FILES["fileTest"]["size"];
                            if ( $file_size > 1000000) {
                            echo "El archivo es muy pesado";
                            $validator = 0;
                        }

                        //Saber que tipo de archivo y lenguaje es
                        $lenguajes = array('Java', 'Php', 'Python', 'C++', 'Txt', 'JavaScript');

                        //Validamos la extensión del archivo
                        if($file_type != "java" && $file_type != "php" && $file_type != "py" && $file_type != "cpp"  && $file_type != "txt" && $file_type != "js") {
                            echo "Solo se permiten archivos tipo Java, Php, Python, C++, Txt, JavaScript";
                            $validator = 0;
                        }

                        //movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
                        if($validator == 1){
                            if (move_uploaded_file($url_temp, $url_target)) {
                                
                                echo "<h4>El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.</h4>";

                                /* Cambiar luego este valor */
                                
                                switch($file_type ) {
                                    case "java": 
                                        echo "<h4>El lenguaje del archivo es {$lenguajes[0]} </h4>";
                                        
                                        opJava();
                            
                                        break;
                                    case "php": 
                                        echo "<h4> El lenguaje del archivo es {$lenguajes[1]} </h4>";        
                                        opPhp();
                                        break;
                                    case "py": 
                                        echo "<h4> El lenguaje del archivo es {$lenguajes[2]} </h4>";
                            
                                        opPython();
                                        break;
                                    case "cpp": 
                                        echo "<h4> El lenguaje del archivo es {$lenguajes[3]} </h4>";
                                        opCmasmas();
                                        break;
                                    case "js": 
                                        echo "<h4> El lenguaje del archivo es {$lenguajes[5]} </h4>";
                                        opJavaScript();
                                        break;
                                    case "cgato":
                                        opCgato();
                                        break;  
                                }

                            } else {
                                echo "Ha habido un error al cargar tu archivo.";
                            }
                        }else{
                            echo "Error: el archivo no se ha cargado";
                        }

                        function lectorCoincidencias ($diccionarioArray) {
                            global $file;
                            global $file_type;

                            $archivo = fopen('files/'.$file,"r") or die("Problemas al abrir el archivo");
                            $totalLineas = 0;
                            $totalCoincidencias = 0;

                            echo '
                            <table class="table table-light table-bordered table-hover">
                                
                                <thead>
                                    <tr> 
                                    <th colspan = "3">
                                        Listado de Coincidencias
                                    </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Cáracter</th>
                                        <th scope="col">Núm Línea</th>
                                        <th scope="col">Palabra encontrada</th>
                                    </tr>
                                </thead>
                                <tbody>';

                            while(!feof($archivo)) {

                                $traer = fgets($archivo);
                                    
                                $cadena = $traer;

                                $totalLineas = $totalLineas + 1;

                                $palabras = explode(" ", $cadena);

                                for ($i = 0; $i < count($palabras); $i++) {

                                    for ($k=0; $k < count($diccionarioArray); $k++) { 
                                        $array = array(); 
                                        if (str_contains($palabras[$i], $diccionarioArray[$k])) {

                                            if($file_type == "py") {
                                                preg_match("/_[for]*_/i", $palabras[$i],$array);
                                            }

                                            if($file_type == "php") {
                                                preg_match_all("/[^a-z][do]*/i", $palabras[$i],$array);                                
                                            }

                                            if(count($array) == 0 ) {
                                                $totalCoincidencias = $totalCoincidencias + 1;
                                                echo " 
                                                    <tr>                                      
                                                        <td>".htmlentities($cadena)."</td> 
                                                        <td>".$totalLineas." </td>
                                                        <td>".htmlentities($diccionarioArray[$k])."</td>
                                                    </tr>"; 
                                            }                                           
                                        }
                                    }                                                       
                                }
                            }  

                            echo " </tbody>
                            <tfooter> 
                                <tr> 
                                <td> <strong> {$totalCoincidencias} Coincidencias Totales </td> 
                                <td colspan='2'>{$totalLineas} Líneas Totales</td>
                                </tr>
                            </tfooter>
                            
                            </table>";

                        }

                        function impresionCadena ($cadena) {
                            echo $cadena/* ."<br>" */;
                        }

                        function opPython() {

                            $diccionarioArray = array();
                            
                            array_push($diccionarioArray,"and");
                            array_push($diccionarioArray,"del");
                            array_push($diccionarioArray,"for");
                            array_push($diccionarioArray,"is");
                            array_push($diccionarioArray,"raise");
                            array_push($diccionarioArray,"assert");
                            array_push($diccionarioArray,"elif");
                            array_push($diccionarioArray,"from");
                            array_push($diccionarioArray,"lambda");
                            array_push($diccionarioArray,"return");
                            array_push($diccionarioArray,"break");
                            array_push($diccionarioArray,"else");
                            array_push($diccionarioArray,"global");
                            array_push($diccionarioArray,"not");
                            array_push($diccionarioArray,"try");
                            array_push($diccionarioArray,"class");
                            array_push($diccionarioArray,"except");
                            array_push($diccionarioArray,"if");
                            array_push($diccionarioArray,"or");
                            array_push($diccionarioArray,"while");
                            array_push($diccionarioArray,"continue");
                            array_push($diccionarioArray,"exec");
                            array_push($diccionarioArray,"import");
                            array_push($diccionarioArray,"pass");
                            array_push($diccionarioArray,"with");
                            array_push($diccionarioArray,"def");
                            array_push($diccionarioArray,"finally");
                            array_push($diccionarioArray,"in");
                            array_push($diccionarioArray,"print");
                            array_push($diccionarioArray,"yield");
                            array_push($diccionarioArray,"nonlocal");
                            array_push($diccionarioArray,"false");
                            array_push($diccionarioArray,"true");
                            array_push($diccionarioArray,"none");
                            array_push($diccionarioArray,"await");
                            array_push($diccionarioArray,"with");
                            array_push($diccionarioArray,"#");
                            array_push($diccionarioArray,">>>");
                            array_push($diccionarioArray,"<<<");
                            array_push($diccionarioArray,"&");
                            array_push($diccionarioArray,";");
                            array_push($diccionarioArray,"urllib.parse.parse_qs");  
                            array_push($diccionarioArray,"urllib.parse.parse_qsl");
                            array_push($diccionarioArray,"cgi.parse");            
                            array_push($diccionarioArray,"cgi.parse_multipart");    
                            array_push($diccionarioArray,"asyncio.loop.create_datagram_endpoint");
                            array_push($diccionarioArray,"aifc");
                            array_push($diccionarioArray,"asyncio");
                            array_push($diccionarioArray,"collections");
                            array_push($diccionarioArray,"dbm");
                            array_push($diccionarioArray,"enum");
                            array_push($diccionarioArray,"gettext");
                            array_push($diccionarioArray,"importlib");
                            array_push($diccionarioArray,"locale");
                            array_push($diccionarioArray,"macpath");
                            array_push($diccionarioArray,"threading");
                            array_push($diccionarioArray,"socket");
                            array_push($diccionarioArray,"ssl");
                            array_push($diccionarioArray,"sunau");
                            array_push($diccionarioArray,"sys");
                            array_push($diccionarioArray,"wave");
                            array_push($diccionarioArray,"PySlice_GetIndicesEx");
                            array_push($diccionarioArray,"PyOS_AfterFork");
                            array_push($diccionarioArray,"object.__aiter__");
                            
                            lectorCoincidencias($diccionarioArray);
                        }

                        function opPHP () {

                            $diccionarioArray = array();
                        
                            array_push($diccionarioArray, "switch");
                            array_push($diccionarioArray, "case");
                            array_push($diccionarioArray, "for");
                            array_push($diccionarioArray, "break");
                            array_push($diccionarioArray, "callable");
                            array_push($diccionarioArray, "catch");
                            array_push($diccionarioArray, "clone");
                            array_push($diccionarioArray, "continue");
                            array_push($diccionarioArray, "declare");
                            array_push($diccionarioArray, "default");
                            array_push($diccionarioArray, "while");
                            array_push($diccionarioArray, "do");
                            array_push($diccionarioArray, "empty");
                            array_push($diccionarioArray, "enddeclare");
                            array_push($diccionarioArray, "endfor");
                            array_push($diccionarioArray, "endforeach");
                            array_push($diccionarioArray, "endif");
                            array_push($diccionarioArray, "endswitch");
                            array_push($diccionarioArray, "endwhile");
                            array_push($diccionarioArray, "extends");
                            array_push($diccionarioArray, "finally");
                            array_push($diccionarioArray, "final");
                            array_push($diccionarioArray, "fn");
                            array_push($diccionarioArray, "foreach");
                            array_push($diccionarioArray, "global");
                            array_push($diccionarioArray, "implements");
                            array_push($diccionarioArray, "include");
                            array_push($diccionarioArray, "include_once");
                            array_push($diccionarioArray, "instanceof");
                            array_push($diccionarioArray, "insteadof");
                            array_push($diccionarioArray, "interface");
                            array_push($diccionarioArray, "isset");
                            array_push($diccionarioArray, "list");
                            array_push($diccionarioArray, "namespace");
                            array_push($diccionarioArray, "new");
                            array_push($diccionarioArray, "private");
                            array_push($diccionarioArray, "protected");
                            array_push($diccionarioArray, "public");
                            array_push($diccionarioArray, "require");
                            array_push($diccionarioArray, "require_once");
                            array_push($diccionarioArray, "function");
                            array_push($diccionarioArray, "static");
                            array_push($diccionarioArray, "throw");
                            array_push($diccionarioArray, "trait");
                            array_push($diccionarioArray, "try");
                            array_push($diccionarioArray, "xor");
                            array_push($diccionarioArray, "yield");
                            array_push($diccionarioArray, "yield from");
                            /* array_push($diccionarioArray, "echo"); */
                    
                            lectorCoincidencias($diccionarioArray);
                        }

                        function opJava() {
                
                            $diccionarioArray = array();
                    
                            array_push($diccionarioArray,"for");
                            array_push($diccionarioArray,"while");
                            array_push($diccionarioArray,"do-while");
                            array_push($diccionarioArray,"Class");
                            array_push($diccionarioArray,"if");
                            array_push($diccionarioArray,"SQLQuery");
                            array_push($diccionarioArray,"preparedStatement");
                            array_push($diccionarioArray,"getConnection");
                            array_push($diccionarioArray,"Array");
                            array_push($diccionarioArray,"ArrayList");
                            array_push($diccionarioArray,"import");
                            array_push($diccionarioArray,"package");
                            array_push($diccionarioArray,"/*");
                            array_push($diccionarioArray,"//");
                            array_push($diccionarioArray,"==");
                            array_push($diccionarioArray,"&&");
                            array_push($diccionarioArray,"||");
                            array_push($diccionarioArray,"if else");
                            array_push($diccionarioArray,"System.out");
                            array_push($diccionarioArray,"catch");
                            array_push($diccionarioArray,"implements");
                            array_push($diccionarioArray,"new");
                            array_push($diccionarioArray,"switch");
                            array_push($diccionarioArray,"this");
                            array_push($diccionarioArray,"brake");
                            array_push($diccionarioArray,"case");
                    
                            lectorCoincidencias($diccionarioArray);
                        }

                        function opJavaScript() {

                            $diccionarioArray = array();
                    
                            array_push($diccionarioArray, "var");
                            array_push($diccionarioArray, "let");
                            array_push($diccionarioArray, "const");
                            array_push($diccionarioArray, "null");
                            array_push($diccionarioArray, "switch");
                            array_push($diccionarioArray, "for");
                            array_push($diccionarioArray, "while");
                            array_push($diccionarioArray, "function");
                            array_push($diccionarioArray, "class");
                            array_push($diccionarioArray, "===");
                            array_push($diccionarioArray, "&&");
                            array_push($diccionarioArray, "||");
                            array_push($diccionarioArray, "!");
                            array_push($diccionarioArray, "typeof");
                            array_push($diccionarioArray, "window.prompt");
                            array_push($diccionarioArray, "console.log");
                            array_push($diccionarioArray, "if");
                            array_push($diccionarioArray, "else if");
                            array_push($diccionarioArray, "else");
                    
                            lectorCoincidencias($diccionarioArray);
                        }

                        function opCmasmas() {

                            $diccionarioArray = array();
                    
                            array_push($diccionarioArray, "throw(typeid)");
                            array_push($diccionarioArray, "Trigraphs");
                            array_push($diccionarioArray, "std::auto_ptr");
                            array_push($diccionarioArray, "std::random_shuffle");
                            array_push($diccionarioArray, "std::uncaught_exception");
                            array_push($diccionarioArray, "throw()");
                            array_push($diccionarioArray, "result_of");
                            array_push($diccionarioArray, "codecvt");
                            array_push($diccionarioArray, "memory_order_consume");
                            array_push($diccionarioArray, "int");
                            array_push($diccionarioArray, "for");
                            array_push($diccionarioArray, "if");
                            array_push($diccionarioArray, "cout");
                            array_push($diccionarioArray, "else");
                            array_push($diccionarioArray, "cin");
                            
                    
                            lectorCoincidencias($diccionarioArray);
                        }

                        function opCgato() {

                            $diccionarioArray = array();
                        
                                array_push($diccionarioArray, "using");
                                array_push($diccionarioArray, "namespace");
                                array_push($diccionarioArray, "class");
                                array_push($diccionarioArray, "void");
                                array_push($diccionarioArray, "Console");
                                array_push($diccionarioArray, "WriteLine");
                                array_push($diccionarioArray, "new");
                                array_push($diccionarioArray, "char");
                                array_push($diccionarioArray, "string");
                                array_push($diccionarioArray, "bool");
                                array_push($diccionarioArray, "double");
                                array_push($diccionarioArray, "ToString");
                                array_push($diccionarioArray, "Write");
                                array_push($diccionarioArray, "//");
                                array_push($diccionarioArray, "break");
                                array_push($diccionarioArray, "throw");
                                array_push($diccionarioArray, "try");
                                array_push($diccionarioArray, "checked");
                                array_push($diccionarioArray, "unchecked");
                                array_push($diccionarioArray, "lock");
                                array_push($diccionarioArray, "[]");
                                array_push($diccionarioArray, "throw ");
                                array_push($diccionarioArray, "throw ");
                        
                                lectorCoincidencias($diccionarioArray);
                            }

                    ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
    </script>
</body>
</html>
