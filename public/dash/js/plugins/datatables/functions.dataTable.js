$(document).ready(function(){
    var dataTable  = $(".datatablegus");
    if(dataTable.length > 0){
        dataTable.dataTable({
            iDisplayLength: 25,
            /*order: [[ 5, "asc" ]],*/
            "language": {
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No existe registro alguno",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros en total)"
            },
            fnPreDrawCallback: function(oSettings, json) {
                $('.dataTables_filter input').attr('placeholder', 'Buscar.');
            }
        });
        dataTable.on('page.dt',function () {
            onresize(100);
        });
    }

    var photoNote = $(".photoNoteTable");
    if(photoNote.length > 0){
        photoNote.dataTable({
            iDisplayLength: 25,
            order: [[ 2, "asc" ]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada por el momento -Lo lamento",
                "info": "Mostrando de _PAGE_ a _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros en total)"
            },
            fnPreDrawCallback: function(oSettings, json) {
                $('.dataTables_filter input').attr('placeholder', 'Buscar.');
            }
        });
        photoNote.on('page.dt',function () {
            onresize(100);
        });
    }

    var tableTags = $(".datatableTag");
    if(tableTags.length > 0){
        order = tableTags.attr("data-order");
        filter = tableTags.attr("data-filter");
        tableTags.dataTable({
            iDisplayLength: 25,
            order: [[ order, filter ]],
            "language": {
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada por el momento -Lo lamento",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros en total)"
            },
            fnPreDrawCallback: function(oSettings, json) {
                $('.dataTables_filter input').attr('placeholder', 'Buscar.');
            }
        });
        tableTags.on('page.dt',function () {
            onresize(100);
        });
    }

    var generalDT = $(".generalDT");
    if(generalDT.length > 0){
        order = generalDT.attr("data-order");
        filter = generalDT.attr("data-filter");
        generalDT.dataTable({
            iDisplayLength: 25,
            order: [[ order, filter ]],
            "language": {
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada por el momento -Lo lamento",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros en total)"
            },
            fnPreDrawCallback: function(oSettings, json) {
                $('.dataTables_filter input').attr('placeholder', 'Buscar.');
            }
        });
        generalDT.on('page.dt',function () {
            onresize(100);
        });
    }
});