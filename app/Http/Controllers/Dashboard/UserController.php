<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Team;
use App\Libs\Datatable\TableRecords;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    public function index() {
      return view('dashboard.users.index');
    }
    
    public function new() {
      return view('dashboard.users.new');
    }
    
    public function store(Request $request) {
      $request->validate([
        'email' => 'required|string|email|max:255|unique:users',
      ]);

      $user = auth()->user();
      
      $input = array_merge($request->all(), ['team_id' => $user->team_id]);
      $pwd = $input['password'];
      if(!is_null($pwd)) {
        $input['password'] = Hash::make($pwd);
      }

      User::create($input);
      return redirect()->route('users.new')->with('userStatus', 'User created!');
    }
    
    public function edit(User $user) {
      return view('dashboard.users.edit')->with('user', $user);
    }

    public function update(User $user, Request $req) {
      $input = $req->all();
      $pwd = $input['password'];
      if(!is_null($pwd)) {
        $input['password'] = Hash::make($pwd);
      }
      
      $user->update($input);
      return redirect()->route('users.edit', $user)->with('userStatus', 'User updated!');
    }
    
    public function destroy(User $user) {
      $id = $user->id;
      $user->delete();
      return response()->json(['id' => $id]);
    }

    public function destroyArray(Request $req) {
      $ids = $req->ids;
      $adminId = auth()->user()->id;

      if (($key = array_search($adminId, $ids)) !== false) {
        unset($ids[$key]);
      }

      user::destroy($ids);
      return response()->json(['ids' => $ids]);
    }
  
    public function pwdEdit()
    {
      return view('dashboard.users.pwdEdit');
    }

    public function pwdUpdate(Request $req)
    {
      $req->validate([
        'current_password' => ['required', new MatchOldPassword],
        'new_password' => ['required'],
        'new_confirm_password' => ['same:new_password'],
      ]);
      
      User::find(auth()->user()->id)->update(['password' => Hash::make($req->new_password)]);

      return redirect()->route('users.pwdEdit')->with('userStatus', 'Password change successfully.');
    }

    public function smtp()
    {
      return view('dashboard.users.smtp'); 
    }

    public function usersTable(Request $request, TableRecords $tableRecords) {
      $team_id = auth()->user()->team_id;
      $users = Team::find($team_id)->users()->orderByRaw('FIELD(user_role, "admin", "user")')->orderBy('created_at', 'desc')->get();
      return $tableRecords->makeRecordsFromData($users->toArray(), $request->all());
    }
}
