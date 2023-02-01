<?php 
    require_once '../controladores/formularios.controlador.php';
    require_once '../views/header.php';
?>

<body>

    <?php 
        require_once '../views/navbar.php';
    ?>  
    <div class="container">
        <div class="d-flex justify-content-center text-center">

            <form class="p-5 bg-dark rounded-lg was-validated b-radius" method="post" action="../prueba.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="archivos" class="text-white label-st">ZIP:</label>

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-solid fa-folder"></i>
                            </span>
                        </div>
                        
                        <input type="file" class="form-control" id="archivos" required name="envioarchivos" > <!-- "webkitdirectory directory multiple" parametro de html para insertar varios archivos-->
                        <div class="valid-feedback">Valido</div>
                        <div class="invalid-feedback">Complete este campo</div>
                    </div>
                    <ul class="bg-white" id="listing"></ul>

                </div>
                <!-- <a class="btn btn-primary" href="login">Atras</a> -->
                <button type="submit" class="btn btn-custom">Enviar</button>

            </form>

        </div>
    </div>
</body>

<script>
    /* document.getElementById("archivos").addEventListener("change", (event) => {
        let output = document.getElementById("listing");
        for (const file of event.target.files) {
            let item = document.createElement("li");
            item.textContent = file.webkitRelativePath;
            output.appendChild(item);
        };
    }, false); */
</script>