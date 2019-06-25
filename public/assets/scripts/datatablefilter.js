
$(document).ready(function() {

    var table =$("#folders_table").DataTable({

        "columnDefs": [
            {
                "targets": [5],
                "visible": false,
                "searchable": true,
                "className": 'hidden'
            },
            {
                "targets": [1],
                "type": 'date-eu'
            },
            {
                "targets": [0],
                "type": 'num-doss'
            }
        ],
        responsive : true


    });
    // Event listener to the two range filtering inputs to redraw on input
    $('#btnMar').click( function() {


        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var entree = "maritime";
                var type =  data[5]  ; // use data for the age column

                if ( entree==type )
                {
                    return true;
                }

                return false;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(function( settings, data, dataIndex ) {
            var entree = "maritime";
            var type =  data[5]  ; // use data for the age column

            if ( entree==type )
            {
                return true;
            }

            return false;
        }, 1));
    } );
    $('#btnAer').click( function() {
        table.search("").draw();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var entree = "arial";
                var type =  data[5]  ; // use data for the age column

                if ( entree==type )
                {
                    return true;
                }

                return false;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(function( settings, data, dataIndex ) {
            var entree = "arial";
            var type =  data[5]  ; // use data for the age column

            if ( entree==type )
            {
                return true;
            }

            return false;
        }, 1));
    } );

    $('#btnRoa').click( function() {
        table.search("").draw();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var entree = "road";
                var type =  data[5]  ; // use data for the age column

                if ( entree==type )
                {
                    return true;
                }

                return false;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(function( settings, data, dataIndex ) {
            var entree = "road";
            var type =  data[5]  ; // use data for the age column

            if ( entree==type )
            {
                return true;
            }

            return false;
        }, 1));
    } );
    $('#btnLog').click( function() {
        table.search("").draw();


      $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var entree = "logistic";
                var type = data[5];  // use data for the age column

                if ( entree==type )
                {
                    return true;
                }

                return false;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(function( settings, data, dataIndex ) {
            var entree = "logistic";
            var type =  data[5];

            if ( entree==type )
            {
                return true;
            }

            return false;
        }, 1));
    } );
    $('#btnTra').click( function() {
        table.search("").draw();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var entree = "transit";
                var type =  data[5]; // use data for the age column

                if ( entree==type )
                {
                    return true;
                }

                return false;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(function( settings, data, dataIndex ) {
            var entree = "transit";
            var type =  data[5]  ; // use data for the age column

            if ( entree==type )
            {
                return true;
            }

            return false;
        }, 1));
    } );
    $('#btnAll').click( function() {

        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {


                return true;
            }
        );
        table.draw();
        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(function( settings, data, dataIndex ) {

            return true;


    } ));});
} );