<?php

    /* 
        Crea un array con el contenido de la siguiente tabla:
        Frutas Deportes Idiomas
        Manzana Fútbol Español
        Naranja Tenis Inglés
        Sandia Baloncesto Francés
        Fresa Béisbol Italiano
    */

    $tabla = array(
        "Frutas" => array("Manzana", "Naranja", "Sandia", "Fresa"),
        "Deportes" => array("Futbol", "Tenis", "Baloncesto", "Beisbol"),
        "Idiomas" => array("Español", "Ingles", "Frances", "Italiano")
    );

    //var_dump($tabla);
?>

<table border=1>
	<tr>
		<th>Frutas</th>
		<th>Deportes</th>
		<th>Idiomas</th>
	</tr>
	<tr>
		<td><?=$tabla["Frutas"][0]?></td>
		<td><?=$tabla["Deportes"][0]?></td>
		<td><?=$tabla["Idiomas"][0]?></td>
	</tr>
	<tr>
		<td><?=$tabla["Frutas"][1]?></td>
		<td><?=$tabla["Deportes"][1]?></td>
		<td><?=$tabla["Idiomas"][1]?></td>
	</tr>
	<tr>
		<td><?=$tabla["Frutas"][2]?></td>
		<td><?=$tabla["Deportes"][2]?></td>
		<td><?=$tabla["Idiomas"][2]?></td>
	</tr>
</table>