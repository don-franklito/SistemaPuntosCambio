<?php 
    include("conexion.php");
    $con = conectar();

    $sql = "SELECT * FROM palabras p INNER JOIN lenguajes l ON p.Lenguaje_ID = l.Lenguaje_ID";

    $query = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($query);

    $len = "SELECT * FROM lenguajes";
    $rec = mysqli_query($con,$len);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Puntos de Cambio </title>
            <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Css styles -->
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
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
                            <?php while($fila = $rec->fetch_assoc()): ?>
                                <option value="<?= $fila['Lenguaje_ID'] ?>"><?= $fila['Lenguaje_Nombre'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>

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
                                while($row=mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php  echo $row['Lenguaje_Nombre']?></td>
                                <td><?php  echo $row['Palabra_Nombre']?></td> 
                                <td class="col-md-1"><a href="actualizar.php?id=<?php echo $row['Palabras_ID'] ?>" class="text-success"><i class="bi bi-pencil-square"></i</a></td>
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