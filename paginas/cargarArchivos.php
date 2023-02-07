<?php 
    require_once '../controladores/formularios.controlador.php';
    require_once '../views/header.php';
  

?>
<link rel="stylesheet" href="../css/botones.css"> 
<link rel="stylesheet" href="../css/style.css"> 

<body>

    <?php 
        require_once '../views/navbar.php';
    ?>  
    <div class="container ">
        <div class="d-flex justify-content-center text-center">

            <form class="p-5  rounded-lg was-validated b-radius" method="post" action="../prueba.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="archivos" class="text-white label-st">ZIP:</label>

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-solid fa-folder"></i>
                            </span>
                        </div>
                        

                        <input type="file" class="form-control " id="archivos" required name="envioarchivos" > <!-- "webkitdirectory directory multiple" parametro de html para insertar varios archivos-->
                        <div class="valid-feedback">Valido</div>
                        <div class="invalid-feedback">Complete este campo</div>
                    </div>

                </div>
                <!-- <a class="btn btn-primary" href="login">Atras</a> -->
                <button type="submit" class="btn w-25 btn-primary1">Enviar</button>

            </form>

        </div>
    </div>
</body>

