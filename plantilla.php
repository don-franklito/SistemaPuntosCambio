<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Puntos de cambio</title>

	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

</head>

<body>

	<head>
		<nav class="navbar navbar-expand-sm bg-secondary d-flex justify-content-between">
			<h2 class="text-white">Puntos de Cambio</h2>

			<?php

			if (isset($_GET["pagina"])) {

				if (
					$_GET["pagina"] == "cargarArchivos"

				) {

			?>
					<div>

						<a class="btn btn-primary" href="login">Atras</a>
						<a class="btn btn-danger" href="login">Salir</a>

					</div>

			<?php

				}
			}

			?>

			<?php

			if (isset($_GET["pagina"])) {

				if (

					$_GET["pagina"] == "buscarPalabras"
				) {

			?>
					<div>

						<a class="btn btn-primary" href="cargarArchivos">Atras</a>
						<a class="btn btn-danger" href="login">Salir</a>

					</div>

			<?php

				}
			}

			?>

			<?php

			if (isset($_GET["pagina"])) {

				if (
					$_GET["pagina"] == "puntosDeCambio"
				) {

			?>
					<div>

						<a class="btn btn-primary" href="cargarArchivos">Atras</a>
						<a class="btn btn-primary" href="vulnerabilidades">Vulnerabilidades</a>
						<a class="btn btn-danger" href="login">Salir</a>

					</div>

			<?php

				}
			}

			?>

			<?php

			if (isset($_GET["pagina"])) {

				if (
					$_GET["pagina"] == "vulnerabilidades"
				) {

			?>
					<div>

					    <a class="btn btn-primary" href="puntosDeCambio">Puntos de cambios</a>
						<a class="btn btn-danger" href="login">Salir</a>

					</div>

			<?php

				}
			}

			?>

		</nav>
	</head>

	<div class="container-fluid bg-light">

		<div class="container-fluid  py-5">

			<?php

			if (isset($_GET["pagina"])) {

				if (
					$_GET["pagina"] == "login" ||
					$_GET["pagina"] == "cargarArchivos" ||
					$_GET["pagina"] == "buscarPalabras" ||
					$_GET["pagina"] == "puntosDeCambio" ||
					$_GET["pagina"] == "vulnerabilidades"
				) {

					include "paginas/" . $_GET["pagina"] . ".php";
				} else {

					include "paginas/error404.php";
				}
			} else {

				include "paginas/login.php";
			}
			?>

		</div>

	</div>

</body>

</html>