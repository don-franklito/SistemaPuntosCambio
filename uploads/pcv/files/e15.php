<?php 

    /* 
        Escribe un programa que compruebe si una variable esta vacía y si
        está vacía, rellenarla con texto en minúsculas y mostrarlo convertido a mayúsculas
        en negrita.
    */

    $v = '';

    if(empty($v)) {
        $v = 'franklox';
        echo "<strong>".strtoupper($v)."</strong>";
    } else {
        echo "Texto tiene valor";
    }

   
?>