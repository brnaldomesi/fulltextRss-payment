var KTDatatableRecordSelectionDemo = require('../../dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection')

function initFeedTable() {
  KTDatatableRecordSelectionDemo.initFeedTable('/clientAdmin/feedsTable');
  var datatable = KTDatatableRecordSelectionDemo.getFeedTable();
  $('div#local_record_selection table').on('click', 'tbody tr td span button.feed-remove-btn', function () {
    const id = $(this).attr('data-id');
    var tr = $(this).parentsUntil('tr').parent()[0];
    swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
      if (result.value) {
        $.ajax({
          url: '/clientAdmin/feeds/' + id,
          type: 'delete',
          dataType : 'json',
          success: function (response) {
            datatable.reload();
            $(tr).addClass('kt-datatable__row--active');
            datatable.rows('.kt-datatable__row--active').remove();
            swal.fire(
              'Deleted!',
              'Your feed has been deleted.',
              'success'
            )
          },
          error: function (jqXHR, status, error) {
          }
        });
      }
    });
  });

  $('body').on('click', 'div.dropdown-menu.dropdown-menu-right.show button.feed-remove-btn', function (){
    $('tbody tr td span button.feed-remove-btn[data-id=' + $(this).attr('data-id') + ']').trigger('click');
  });

  
}

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  initFeedTable();  
});