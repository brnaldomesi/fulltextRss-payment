var KTDatatableRecordSelectionDemo = require('../../dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection')

function initTransactionTable() {
  KTDatatableRecordSelectionDemo.initTransactionTable('/dashboard/transactionstable');
}

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  initTransactionTable();  
});