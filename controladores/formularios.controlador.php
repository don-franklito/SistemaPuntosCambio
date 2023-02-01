<?php

class ControladorFormularios{

	public function ctrIngreso(){

		if(isset($_POST["loginUsuario"])){
			echo'<script>

				window.location = "cargarArchivos";

			</script>';
		}else{
			
            return "error";
            
        }
			

	}

	public function ctrCargarArchivos(){

		if(isset($_POST["envioarchivos"])){
			echo'<script>

				window.location = "buscarPalabras";

			</script>';

		}else{
			
            return "error";
            
        }
			

	}

	public function ctrBuscarPalabras(){

		if(isset($_POST["envioPalabra"])){
			echo'<script>

				window.location = "puntosDeCambio";

			</script>';
		}else{
			
            return "error";
            
        }
			

	}


}
