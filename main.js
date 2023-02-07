$(document).ready(function() {    
    $('#excel').DataTable({ 
        dom: "Bfrtip",
        buttons: {
            dom:{
                button:{
                    className: 'btn'
                }
            },
            buttons:[
                {
                    extend:"excel",
                    text:'Exportar a Excel',
                    className:'btn btn-success',
                    excelStyles:{
                        template:'header_blue'
                    }
                }
            ]
        }       
        // language: {
        //         "lengthMenu": "Mostrar _MENU_ registros",
        //         "zeroRecords": "No se encontraron resultados",
        //         "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        //         "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        //         "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        //         "sSearch": "Buscar:",
        //         "oPaginate": {
        //             "sFirst": "Primero",
        //             "sLast":"Último",
        //             "sNext":"Siguiente",
        //             "sPrevious": "Anterior"
		// 	     },
		// 	     "sProcessing":"Procesando...",
        //     },
        // //para usar los botones   
        // responsive: "true",
        // dom: 'Bfrtilp',       
        // buttons:[ 
		// 	{
		// 		extend:    'excelHtml5',
		// 		text:      '<i class="fas fa-file-excel"></i> ',
		// 		titleAttr: 'Exportar a Excel',
		// 		className: 'btn btn-success'
		// 	},
		// ]	        
    });     
});