<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-secondary rounded-lg was-validated"  method="post">

		<div class="form-group">
			<label for="usuario">Usuario:</label>
		
			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-user"></i>
					</span>
				</div>

				<input type="text" class="form-control" id="usuario" required name="loginUsuario">
				<div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">Complete este campo</div>

			</div>
			
		</div>

		<div class="form-group">
			<label for="pwd">Contraseña:</label>

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock"></i>
					</span>
				</div>

				<input type="password" class="form-control" id="pwd" required name="loginPwd">
				<div class="valid-feedback">Valido</div>
                <div class="invalid-feedback">Complete este campo</div>

			</div>

		</div>

		<?php 

		$ingreso = new ControladorFormularios();
		$ingreso -> ctrIngreso();

		?>
		
		<button type="submit" class="btn btn-primary">Iniciar sesión</button>

	</form>

</div>