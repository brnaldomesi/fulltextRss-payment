@extends('layouts.dashboard')

@section('content')
  <div class="col-md-12">
    <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
          <span class="kt-portlet__head-icon">
            <i class="kt-font-brand fa fa-rss"></i>
          </span>
          <h3 class="kt-portlet__head-title">
            Transaction history
          </h3>
        </div>
      </div>

      <div class="kt-portlet__body kt-portlet__body--fit">

        <!--begin: Datatable -->
        <div class="kt-datatable" id="transaction_record_selection"></div>

        <!--end: Datatable -->
      </div>
    </div>
  </div>
@endsection

@section('extraJs')
  <script src="{{ asset('js/dashboard/transactions.js') }}"></script>
@endSection