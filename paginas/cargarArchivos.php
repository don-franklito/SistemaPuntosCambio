<?php 
    require_once '../controladores/formularios.controlador.php';
    require_once '../views/header.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="../css/botones.css"> 
<link rel="stylesheet" href="../css/style.css"> 
<style>
    .container {
        margin-top: 5rem;
        max-width: 600px;
        border: solid #007bff 2px;
    }

</style>
<body>

    <?php 
        require_once '../views/navbar.php';
    ?>  
    <div class=" rounded-3 container p-5 bg-light ">
            <div class="d-flex justify-content-center text-center">
                
                <form class="p-5  rounded-lg was-validated" method="post" action="../index.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="archivos" class="text-black label-st">
                            <h5>Por favor seleccione/arrastre un archivo ZIP: </h5>
                        </label>

                        <div class="input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-solid fa-folder"></i>
                                </span>
                            </div>
                            

                            <input type="file" accept=".zip" class="form-control " id="archivos" required name="envioarchivos" onchange="return fileValidation()"> <!-- "webkitdirectory directory multiple" parametro de html para insertar varios archivos-->
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function fileValidation() {
        var fileInput = document.getElementById('archivos');
        var filePath = fileInput.value;
        var allowedExtensions = /(.zip)$/i;
        if(!allowedExtensions.exec(filePath)){
            swal({
                text: "Solo se aceptan archivos .zip",
                icon: "warning",
            });
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }
</script>
