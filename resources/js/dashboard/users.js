var KTDatatableRecordSelectionDemo = require('../../dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection')

function initUserTable() {
  KTDatatableRecordSelectionDemo.initUserTable('/dashboard/userstable');
  var datatable = KTDatatableRecordSelectionDemo.getUserTable();
  $('div#user_record_selection table').on('click', 'tbody tr td span button.user-remove-btn', function () {
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
          url: '/dashboard/users/' + id,
          type: 'delete',
          dataType : 'json',
          success: function (response) {
            toastr.success('User deleted!');
            $(tr).addClass('kt-datatable__row--active');
            datatable.rows('.kt-datatable__row--active').remove();
            datatable.reload();
          },
          error: function (jqXHR, status, error) {
          }
        });
      }
    });
  });

  $('#kt_datatable_delete_all').on('click', function (){
    var ids = datatable.checkbox().getSelectedId();
    $.ajax({
      url: '/dashboard/users',
      type: 'delete',
      dataType : 'json',
      data: {ids},
      success: function (response) {
        toastr.success('Users deleted!');
        datatable.reload();
        datatable.rows('.kt-datatable__row--active').remove();
      },
      error: function (jqXHR, status, error) {
      }
    });
  });  
}

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  initUserTable();  
});