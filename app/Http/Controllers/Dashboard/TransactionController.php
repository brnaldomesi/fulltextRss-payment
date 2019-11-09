<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Libs\Datatable\TableRecords;

class TransactionController extends Controller
{
    public function index() {
      return view('dashboard.transactions.index');
    }
    public function transactionsTable(Request $request, TableRecords $tableRecords) {
      $user_id = auth()->user()->id;
      $transactions = auth()->user()->transactions()->orderBy('created_at', 'desc')->get();
      return $tableRecords->makeRecordsFromData($transactions->toArray(), $request->all());
    }
}
