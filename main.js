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
    });     
});