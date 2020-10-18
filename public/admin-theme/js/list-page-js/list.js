(function($) {
    "use strict";

    // Call the dataTables jQuery plugin
	$(document).ready(function() {
	  $('.dataTable').DataTable();
	});

    // Delete the selected record
    $('.delete-form').on('click', function(e) {
        e.preventDefault();

        let form = $(this);

        bootbox.confirm({
            title: "Delete Record ?",
            message: "Are you sure to delete the record ? This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel',
                    className: "btn-danger btn-sm",
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm',
                    className: "btn-success btn-sm",
                }
            },
            callback: function (result) {
                if (result) {
                    form.submit();
                }
            }
        });
    });
})(jQuery);