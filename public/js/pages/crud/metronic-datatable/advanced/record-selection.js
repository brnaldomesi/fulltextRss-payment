/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection.js":
/*!********************************************************************************************!*\
  !*** ./resources/dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
 // Class definition

var KTDatatableRecordSelectionDemo = function () {
  // Private functions
  var options = {
    // datasource definition
    data: {
      type: 'remote',
      source: {
        read: {
          url: 'http://localhost/metronic-603/docs/api_reference/datatables/demos/default.php'
        }
      },
      pageSize: 10,
      serverPaging: true,
      serverFiltering: true,
      serverSorting: true
    },
    // layout definition

    /* layout: {
        scroll: true, // enable/disable datatable scroll both horizontal and
        // vertical when needed.
        height: 350, // datatable's body's fixed height
        footer: false // display/hide footer
    }, */
    // column sorting
    sortable: true,
    pagination: true,
    // columns definition
    columns: [{
      field: 'RecordID',
      title: '#',
      sortable: false,
      width: 20,
      selector: {
        "class": 'kt-checkbox--solid'
      },
      textAlign: 'center'
    }, {
      field: 'OrderID',
      title: 'Order ID',
      template: '{{OrderID}}'
    }, {
      field: 'Country',
      title: 'Country',
      template: function template(row) {
        return row.Country + ' ' + row.ShipCountry;
      }
    }, {
      field: 'ShipAddress',
      title: 'Ship Address'
    }, {
      field: 'ShipDate',
      title: 'Ship Date',
      type: 'date',
      format: 'MM/DD/YYYY'
    }, {
      field: 'Status',
      title: 'Status',
      // callback function support for column rendering
      template: function template(row) {
        var status = {
          1: {
            'title': 'Pending',
            'class': 'kt-badge--brand'
          },
          2: {
            'title': 'Delivered',
            'class': ' kt-badge--danger'
          },
          3: {
            'title': 'Canceled',
            'class': ' kt-badge--primary'
          },
          4: {
            'title': 'Success',
            'class': ' kt-badge--success'
          },
          5: {
            'title': 'Info',
            'class': ' kt-badge--info'
          },
          6: {
            'title': 'Danger',
            'class': ' kt-badge--danger'
          },
          7: {
            'title': 'Warning',
            'class': ' kt-badge--warning'
          }
        };
        return '<span class="kt-badge ' + status[row.Status]["class"] + ' kt-badge--inline kt-badge--pill">' + status[row.Status].title + '</span>';
      }
    }, {
      field: 'Type',
      title: 'Type',
      autoHide: false,
      // callback function support for column rendering
      template: function template(row) {
        var status = {
          1: {
            'title': 'Online',
            'state': 'danger'
          },
          2: {
            'title': 'Retail',
            'state': 'primary'
          },
          3: {
            'title': 'Direct',
            'state': 'success'
          }
        };
        return '<span class="kt-badge kt-badge--' + status[row.Type].state + ' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-' + status[row.Type].state + '">' + status[row.Type].title + '</span>';
      }
    }, {
      field: 'Actions',
      title: 'Actions',
      sortable: false,
      width: 110,
      overflow: 'visible',
      textAlign: 'left',
      autoHide: false,
      template: function template() {
        return '\
                    <div class="dropdown">\
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" data-toggle="dropdown">\
                            <i class="flaticon2-settings"></i>\
                        </a>\
                        <div class="dropdown-menu dropdown-menu-right">\
                            <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\
                            <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\
                            <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\
                        </div>\
                    </div>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                        <i class="flaticon2-file"></i>\
                    </a>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">\
                        <i class="flaticon2-delete"></i>\
                    </a>\
                ';
      }
    }]
  }; // basic demo

  var localSelectorDemo = function localSelectorDemo() {
    options.search = {
      input: $('#generalSearch')
    };
    var datatable = $('#local_record_selection').KTDatatable(options);
    $('#kt_form_status').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });
    $('#kt_form_type').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });
    $('#kt_form_status,#kt_form_type').selectpicker();
    datatable.on('kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated', function (e) {
      var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes();
      var count = checkedNodes.length;
      $('#kt_datatable_selected_number').html(count);

      if (count > 0) {
        $('#kt_datatable_group_action_form').collapse('show');
      } else {
        $('#kt_datatable_group_action_form').collapse('hide');
      }
    });
    $('#kt_modal_fetch_id').on('show.bs.modal', function (e) {
      var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function (i, chk) {
        return $(chk).val();
      });
      var c = document.createDocumentFragment();

      for (var i = 0; i < ids.length; i++) {
        var li = document.createElement('li');
        li.setAttribute('data-id', ids[i]);
        li.innerHTML = 'Selected record ID: ' + ids[i];
        c.appendChild(li);
      }

      $(e.target).find('.kt-datatable_selected_ids').append(c);
    }).on('hide.bs.modal', function (e) {
      $(e.target).find('.kt-datatable_selected_ids').empty();
    });
  };

  var serverSelectorDemo = function serverSelectorDemo() {
    // enable extension
    options.extensions = {
      checkbox: {}
    };
    options.search = {
      input: $('#generalSearch1')
    };
    var datatable = $('#server_record_selection').KTDatatable(options);
    $('#kt_form_status1').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Status');
    });
    $('#kt_form_type1').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Type');
    });
    $('#kt_form_status1,#kt_form_type1').selectpicker();
    datatable.on('kt-datatable--on-click-checkbox kt-datatable--on-layout-updated', function (e) {
      // datatable.checkbox() access to extension methods
      var ids = datatable.checkbox().getSelectedId();
      var count = ids.length;
      $('#kt_datatable_selected_number1').html(count);

      if (count > 0) {
        $('#kt_datatable_group_action_form1').collapse('show');
      } else {
        $('#kt_datatable_group_action_form1').collapse('hide');
      }
    });
    $('#kt_modal_fetch_id_server').on('show.bs.modal', function (e) {
      var ids = datatable.checkbox().getSelectedId();
      var c = document.createDocumentFragment();

      for (var i = 0; i < ids.length; i++) {
        var li = document.createElement('li');
        li.setAttribute('data-id', ids[i]);
        li.innerHTML = 'Selected record ID: ' + ids[i];
        c.appendChild(li);
      }

      $(e.target).find('.kt-datatable_selected_ids').append(c);
    }).on('hide.bs.modal', function (e) {
      $(e.target).find('.kt-datatable_selected_ids').empty();
    });
  };

  return {
    // public functions
    init: function init() {
      localSelectorDemo(); //serverSelectorDemo();
    }
  };
}();

jQuery(document).ready(function () {
  KTDatatableRecordSelectionDemo.init();
});

/***/ }),

/***/ 1:
/*!**************************************************************************************************!*\
  !*** multi ./resources/dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection.js ***!
  \**************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\Task\yan-huang\FetchRSSFeeds\resources\dist\js\demo1\pages\crud\metronic-datatable\advanced\record-selection.js */"./resources/dist/js/demo1/pages/crud/metronic-datatable/advanced/record-selection.js");


/***/ })

/******/ });