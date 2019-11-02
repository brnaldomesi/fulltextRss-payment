@extends('layouts.clientAdmin')

@section('content')
  <div class="col-md-12">
    <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
          <span class="kt-portlet__head-icon">
            <i class="kt-font-brand fa fa-rss"></i>
          </span>
          <h3 class="kt-portlet__head-title">
            Manage Your Feeds Subscriptions
          </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
          <div class="kt-portlet__head-wrapper">
            <div class="dropdown dropdown-inline">
              <a class="btn btn-brand btn-icon-sm" href="{{ route('feeds.new') }}">
                <i class="flaticon2-plus"></i> Add New
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="kt-portlet__body">

        <!--begin: Search Form -->
        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
          <div class="row align-items-center">
            <div class="col-xl-8 order-2 order-xl-1">
              <div class="row align-items-center">
                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                  <div class="kt-input-icon kt-input-icon--left">
                    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
                      <span><i class="la la-search"></i></span>
                    </span>
                  </div>
                </div>
                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                  <div class="kt-form__group kt-form__group--inline">
                    <div class="kt-form__label">
                      <label>Status:</label>
                    </div>
                    <div class="kt-form__control">
                      <select class="form-control bootstrap-select" id="kt_form_status">
                        <option value="">All</option>
                        <option value="admin">Admin</option>
                        <option value="users">Users</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
              <a href="#" class="btn btn-default kt-hidden">
                <i class="la la-cart-plus"></i> New Order
              </a>
              <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-none"></div>
            </div>
          </div>
        </div>

        <!--end: Search Form -->

        <!--begin: Selected Rows Group Action Form -->
        <div class="kt-form kt-form--label-align-right kt-margin-t-20 collapse" id="kt_datatable_group_action_form">
          <div class="row align-items-center">
            <div class="col-xl-12">
              <div class="kt-form__group kt-form__group--inline">
                <div class="kt-form__label kt-form__label-no-wrap">
                  <label class="kt-font-bold kt-font-danger-">Selected
                    <span id="kt_datatable_selected_number">0</span> records:</label>
                </div>
                <div class="kt-form__control">
                  <div class="btn-toolbar">
                    <div class="dropdown">
                      <button type="button" class="btn btn-brand btn-sm dropdown-toggle" data-toggle="dropdown">
                        Update status
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Pending</a>
                        <a class="dropdown-item" href="#">Delivered</a>
                        <a class="dropdown-item" href="#">Canceled</a>
                      </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-sm btn-danger" type="button" id="kt_datatable_delete_all">Delete All</button>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#kt_modal_fetch_id">Fetch Selected Records</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--end: Selected Rows Group Action Form -->
      </div>
      <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="kt-datatable" id="local_record_selection"></div>

        <!--end: Datatable -->

        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_fetch_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="kt-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="200">
                  <ul class="kt-datatable_selected_ids"></ul>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!--end::Modal-->
      </div>
    </div>
  </div>
@endsection

@section('extraJs')
  <script src="{{ asset('js/pages/crud/metronic-datatable/advanced/record-selection.js') }}"></script>
@endSection