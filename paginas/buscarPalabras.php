</head>

<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-secondary rounded-lg was-validated" method="post" >

        <div class="form-group">
            <label for="archivos">Palabra</label>

            <div class="input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-pen"></i>
                    </span>
                </div>

                <input type="text" class="form-control" id="archivos" required name="envioPalabra">
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">Complete este campo</div>

            </div>

        </div>

        <div class="form-group">
            <label for="lenguaje">Lenguaje:</label>

            <div class="input-group">

                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-code"></i>
                    </span>
                </div>

                <select name="cars" class="custom-select">
                    <option selected value="java">java</option>
                    <option value="javascript">javascript</option>
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                </select>
                <div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">Complete este campo</div>

            </div>

        </div>
        <?php

        $puntosDeCambio = new ControladorFormularios();
        $puntosDeCambio->ctrBuscarPalabras();        

        ?>



        <a class="btn btn-primary" href="cargarArchivos">Atras</a>
        <button type="submit" class="btn btn-primary">Siguiente</button>

    </form>

</div>