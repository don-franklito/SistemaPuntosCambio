<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body style="font-size: 10px;">
	<table class="table">
	  <thead>
	    <tr>
	      
		  <th scope="col">ID</th>
	      <th scope="col">Query Original</th>
	      <th scope="col">Ruta</th>
	      <!---<th scope="col">Query Migrado $</th>--->
	      <th scope="col">Query Migrado @</th>
	    </tr>
	  </thead>
	  <tbody>
		<?php 

		$fp = fopen("PortalProveedores.txt", "r");
		$id =1;
		$contador =1;
		$contaGlobal = 1;
			while (!feof($fp)){
			    $linea = fgets($fp);
			    $linea = trim(($linea));
			    $ex = explode("|", $linea);
				preg_match_all("/#[a-zA-Z\S]*#/i", $ex[1],$array);
				//echo "<pre>";
				//print_r($array);
				//echo "</pre>";
				
				$nuevaLineaArroba=$ex[1];
				$contador =1;
				$contador1 =0;
				foreach ($array as $key => $value) {
					for ($i=0; $i <count($value) ; $i++) { 
					
						$nuevaLineaArroba = str_replace($value[$i], '@'.$contador1,$nuevaLineaArroba);
						$contador1 +=1;	
					}
						
				}
				?>
				<tr>
					<td><?=$id?></td>
					<td><?=htmlspecialchars($ex[1])?></td>
					<td><?=htmlspecialchars($ex[0])?></td> 
				    <!--<td><?=$nuevaLinea?></td>-->
				    <td><?=$nuevaLineaArroba?></td>
				   </tr>
				</tr>
				<?php
				$id +=1;
			}
		?>
	</tbody>
</body>
</html>