<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\Team;
use App\Libs\Datatable\TableRecords;

class FeedsController extends Controller
{
    public function index() {
      return view('dashboard.feeds.index');
    }
    
    public function new() {
      return view('dashboard.feeds.new');
    }
    
    public function store(Request $request) {
      $user = auth()->user();
      
      $input = array_merge($request->all(), ['team_id' => $user->team_id]);
      Feed::create($input);
      return redirect()->route('feeds.new')->with('feedStatus', 'Feed created!');
    }
    
    public function edit(Feed $feed) {
      return view('dashboard.feeds.edit')->with('feed', $feed);
    }

    public function update(Feed $feed, Request $req) {
      $feed->update($req->all());
      return redirect()->route('feeds.edit', $feed)->with('feedStatus', 'Feed updated!');
    }
    
    public function destroy(Feed $feed) {
      $id = $feed->id;
      $feed->delete();
      return response()->json(['id' => $id]);
    }

    public function destroyArray(Request $req) {
      $ids = $req->ids;
      Feed::destroy($ids);
      return response()->json(['ids' => $ids]);
    }
  
    public function feedsTable(Request $request, TableRecords $tableRecords) {
      $team_id = auth()->user()->team_id;
      $feeds = Team::find($team_id)->feeds()->orderBy('created_at', 'desc')->get();
      return $tableRecords->makeRecordsFromData($feeds->toArray(), $request->all());
    }
}
