"use strict";
// Class definition

var KTDatatableRecordSelectionDemo = function() {
  // Private functions
  var options = {
    // toolbar
    toolbar: {
      // toolbar placement can be at top or bottom or both top and bottom repeated
      placement: ['bottom'],

      // toolbar items
      items: {
        // pagination
        pagination: {
          // page size select
          pageSizeSelect: [5, 10, 20, 30, 50], // display dropdown to select pagination size. -1 is used for "ALl" option
        },
      },
    },

    // column sorting
    sortable: true,

    pagination: true,
  };

  var feedDataTable;
  var userDataTable;
  var transactionDataTable;

  // basic demo
  var feedTableDemo = function(apiUrl) {
    // datasource definition
    options.data = {
      type: 'remote',
      source: {
          read: {
              url: apiUrl,
          },
      },
      pageSize: 5,
      serverPaging: true,
      serverFiltering: true,
      serverSorting: true,
    }

    // columns definition

    options.columns = [{
        field: 'id',
        title: '#',
        sortable: false,
        width: 20,
        selector: {
            class: 'kt-checkbox--solid'
        },
        textAlign: 'center',
    }, {
        field: 'feed_title',
        title: 'Feed Title',
        template: function(row) {
          return row.feed_title === null ? '' : row.feed_title;
        },
    }, {
        field: 'feed_url',
        title: 'Rss Feeds URL',
        template: '{{feed_url}}',
    }, {
        field: 'audience',
        title: 'Audience',
        // callback function support for column rendering
        template: function(row) {
          var status = {
              'admin': {'title': 'Admin', 'class': ' kt-badge--primary'},
              'users': {'title': 'Users', 'class': ' kt-badge--success'},
          };
          return '<span class="kt-badge ' + status[row.audience].class + ' kt-badge--inline kt-badge--pill">' + status[row.audience].title + '</span>';
        },
    }, {
        field: 'Actions',
        title: 'Actions',
        sortable: false,
        width: 110,
        overflow: 'visible',
        textAlign: 'left',
        autoHide: false,
        template: function(row) {
          return '\
                <div class="dropdown">\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="dropdown">\
                        <i class="flaticon2-settings"></i>\
                    </a>\
                    <div class="dropdown-menu dropdown-menu-right">\
                        <a class="dropdown-item" href="/dashboard/feeds/' + row.id + '/edit"><i class="la la-edit"></i> Edit</a>\
                        <button data-id=' + row.id + ' class="dropdown-item feed-remove-btn"><i class="la la-remove"></i> Delete</button>\
                        <a data-id=' + row.id + ' class="dropdown-item feed-full-text" data-url=' + row.feed_url + '><i class="la la-print"></i> Full Text</a>\
                        <a class="dropdown-item" href="#"><i class="la la-play"></i> Sus. Feed (me)</a>\
                        <a class="dropdown-item" href="#"><i class="la la-play"></i> Sus. Feed (global)</a>\
                    </div>\
                </div>\
                <a href="/dashboard/feeds/' + row.id + '/edit" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                    <i class="flaticon2-file"></i>\
                </a>\
                <button data-id=' + row.id + ' class="btn btn-sm btn-clean btn-icon btn-icon-sm feed-remove-btn" title="Delete">\
                    <i class="flaticon2-delete"></i>\
                </button>\
            ';
        },
    }];

    // enable extension
    options.extensions = {
      checkbox: {},
    };

    options.search = {
        input: $('#generalSearch'),
    };

    var datatable = $('#feed_record_selection').KTDatatable(options);
    feedDataTable = datatable;

    $('#kt_form_audience').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'audience');
    });

    $('#kt_form_audience').selectpicker();

    datatable.on(
      'kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated',
      function(e) {
        var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes();
        var count = checkedNodes.length;
        $('#kt_datatable_selected_number').html(count);
        if (count > 0) {
            $('#kt_datatable_group_action_form').collapse('show');
        } else {
            $('#kt_datatable_group_action_form').collapse('hide');
        }
      }
    );
  };

  var userTableDemo = function(apiUrl) {
    // datasource definition
    options.data = {
      type: 'remote',
      source: {
          read: {
              url: apiUrl,
          },
      },
      pageSize: 5,
      serverPaging: true,
      serverFiltering: true,
      serverSorting: true,
    }

    // columns definition

    options.columns = [{
        field: 'id',
        title: '#',
        sortable: false,
        width: 20,
        selector: {
            class: 'kt-checkbox--solid'
        },
        textAlign: 'center',
    }, {
        field: 'name',
        title: 'Name',
        template: function(row) {
          var first_name = row.first_name === null ? '' : row.first_name;
          var last_name = row.last_name === null ? '' : row.last_name;
          return (first_name + " " + last_name);
        },
    }, {
        field: 'email',
        title: 'E-mail',
        template: '{{email}}',
    }, {
        field: 'filter_keywords',
        title: 'Filters',
        template: function(row) {
          return row.filter_keywords === null ? '' : row.filter_keywords;
        },
    }, {
        field: 'user_role',
        title: 'Role',
        template: function(row) {
          return row.user_role === null ? '' : row.user_role;
        },
    }, {
        field: 'status',
        title: 'Status',
        // callback function support for column rendering
        template: function(row) {
          var status = {
              'pending': {'title': 'pending', 'class': ' kt-badge--primary'},
              'active': {'title': 'active', 'class': ' kt-badge--success'},
          };
          return '<span class="kt-badge ' + status[row.status].class + ' kt-badge--inline kt-badge--pill">' + status[row.status].title + '</span>';
        },
    }, {
        field: 'Actions',
        title: 'Actions',
        sortable: false,
        width: 110,
        overflow: 'visible',
        textAlign: 'left',
        autoHide: false,
        template: function(row) {
          if(row.user_role === 'admin') {
            return '\
                  <a href="/dashboard/users/' + row.id + '/edit" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                      <i class="flaticon2-file"></i>\
                  </a>\
              ';
          } else {
            return '\
                  <a href="/dashboard/users/' + row.id + '/edit" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                      <i class="flaticon2-file"></i>\
                  </a>\
                  <button data-id=' + row.id + ' class="btn btn-sm btn-clean btn-icon btn-icon-sm user-remove-btn" title="Delete">\
                      <i class="flaticon2-delete"></i>\
                  </button>\
              ';
          }
        },
    }];

    // enable extension
    options.extensions = {
      checkbox: {},
    };

    options.search = {
        input: $('#generalSearch'),
    };

    var datatable = $('#user_record_selection').KTDatatable(options);
    userDataTable = datatable;

    $('#kt_form_status').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'status');
    });

    $('#kt_form_user-role').on('change', function() {
        datatable.search($(this).val().toLowerCase(), 'user_role');
    });

    $('#kt_form_status, #kt_form_user-role').selectpicker();

    datatable.on(
      'kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated',
      function(e) {
        var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes();
        var count = checkedNodes.length;
        $('#kt_datatable_selected_number').html(count);
        if (count > 0) {
            $('#kt_datatable_group_action_form').collapse('show');
        } else {
            $('#kt_datatable_group_action_form').collapse('hide');
        }
      }
    );
  };

  var transactionTableDemo = function(apiUrl) {
    // datasource definition
    options.data = {
      type: 'remote',
      source: {
          read: {
              url: apiUrl,
          },
      },
      pageSize: 5,
      serverPaging: true,
      serverFiltering: true,
      serverSorting: true,
    }

    // columns definition
    options.columns = [{
        field: 'id',
        title: '#',
        sortable: false,
        width: 20,
        textAlign: 'center',
        template: function(row) {
          return row.id;
        }
    },{
      field: 'price',
      title: 'Price(USD)',
      template: function(row) {
        return row.price === null ? '' : row.price;
      },
    },{
        field: 'payment_status',
        title: 'Payment status',
        // callback function support for column rendering
        template: function(row) {
          return row.payment_status === null ? '' : row.payment_status;
        },
    },{
      field: 'created_at',
      title: 'Date',
      // callback function support for column rendering
      template: function(row) {
        return row.created_at === null ? '' : row.created_at.substring(0, 10);
      },
    },{
      field: 'transaction_id',
      title: 'Transaction ID',
      width: '250',
      // callback function support for column rendering
      template: function(row) {
        return row.transaction_id;
      },
    }]

    var datatable = $('#transaction_record_selection').KTDatatable(options);
    transactionDataTable = datatable;
  };

  return {
    initFeedTable: function(apiUrl) {
      feedTableDemo(apiUrl);
    },
    // Get Feed datatable
    getFeedTable: function() {
      return feedDataTable;
    },

    initUserTable: function(apiUrl) {
      userTableDemo(apiUrl);
    },
    // Get User datatable
    getUserTable: function() {
      return userDataTable;
    },

    initTransactionTable: function(apiUrl) {
      transactionTableDemo(apiUrl);
    },
  };
}();

module.exports = KTDatatableRecordSelectionDemo; 
