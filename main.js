$(document).ready(function() {    
    $('#excel').DataTable({ 
		orderCellsTop: true,
		fixedHeader: true,
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
	});
	$('#example thead tr').clone(true).appendTo( '#example thead' );

    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html( '<input type="text" placeholder="Search...'+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
}
		} )
	})
}) 