function format ( d ) {
	return d.Details;
}
 
$(document).ready(function() {
    var dt = $('#ManageAppointmentsTable').DataTable( {
        "bProcessing": true,
	"iDisplayLength": 10,
        "sAjaxSource": "php/datatable_list_appointments.php", 

	"fnInitComplete": function() {
		$(".iframe_presenterbox").colorbox({iframe:true, top:"100px", width:"850px", height:"550px",scrolling: false});
		
	},


    "oLanguage": {
      "sInfo": "Showing _START_ to _END_ of _TOTAL_ appointments"
    },

        "aoColumns": [
            {
                "class":          "details-control",
                "orderable":      false,
                mData:           null,
                "defaultContent": ""
            },
		{ mData: 'RegDate' },
		{ mData: 'ApptDate' },
		{ mData: 'Time' },
		{ mData: 'Username' },
                { mData: 'Action', sClass: "dataTableCellMiddle", "orderable": false },
		
        ],
	"dom": 'rt<"top"if>rt<"bottom"p><"clear">',
        "order": [[1, 'desc']]

    } );
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#ManageAppointmentsTable tbody').on( 'click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();
 
            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dt.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
} );
