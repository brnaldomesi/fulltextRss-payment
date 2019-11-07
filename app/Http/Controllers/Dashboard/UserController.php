<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Team;
use App\Libs\Datatable\ListUtil;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
      User::create($input);
      return redirect()->route('users.new')->with('userStatus', 'User created!');
    }
    
    public function edit(User $user) {
      return view('dashboard.users.edit')->with('user', $user);
    }

    public function update(User $user, Request $req) {
      $user->update($req->all());
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
  
    public function smtp()
    {
      return view('dashboard.users.smtp'); 
    }

    public function usersTable(Request $request) {
      $team_id = auth()->user()->team_id;
      $users = Team::find($team_id)->users()->orderByRaw('FIELD(user_role, "admin", "user")')->orderBy('created_at', 'desc')->get();
      
      $data = $alldata = $users->toArray();
      $datatable = array_merge(array('pagination' => array(), 'sort' => array(), 'query' => array()), $request->all());

      // search filter by keywords
      $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch']) ? $datatable['query']['generalSearch'] : '';
      if (!empty($filter)) {
          $data = array_filter($data, function ($a) use ($filter) {
              return (boolean)preg_grep("/$filter/i", (array)$a);
          });
          unset($datatable['query']['generalSearch']);
      }

      // filter by field query
      $query = isset($datatable['query']) && is_array($datatable['query']) ? $datatable['query'] : null;
      if (is_array($query)) {
          $query = array_filter($query);
          foreach ($query as $key => $val) {
              $data = $this->list_filter($data, array($key => $val));
          }
      }

      $sort = !empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'asc';
      $field = !empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'id';

      $meta = array();
      $page = !empty($datatable['pagination']['page']) ? (int)$datatable['pagination']['page'] : 1;
      $perpage = !empty($datatable['pagination']['perpage']) ? (int)$datatable['pagination']['perpage'] : -1;

      $pages = 1;
      $total = count($data); // total items in array

      // sort
      usort($data, function ($a, $b) use ($sort, $field) {
          if (!isset($a->$field) || !isset($b->$field)) {
              return false;
          }

          if ($sort === 'asc') {
              return $a->$field > $b->$field ? true : false;
          }

          return $a->$field < $b->$field ? true : false;
      });

      // $perpage 0; get all data
      if ($perpage > 0) {
          $pages = ceil($total / $perpage); // calculate total pages
          $page = max($page, 1); // get 1 page when $_REQUEST['page'] <= 0
          $page = min($page, $pages); // get last page when $_REQUEST['page'] > $totalPages
          $offset = ($page - 1) * $perpage;
          if ($offset < 0) {
              $offset = 0;
          }

          $data = array_slice($data, $offset, $perpage, true);
      }

      $meta = array(
          'page' => $page,
          'pages' => $pages,
          'perpage' => $perpage,
          'total' => $total,
      );

      // if selected all records enabled, provide all the ids
      if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
          $meta['rowIds'] = array_map(function ($row) {
              foreach ($row as $first) break;
              return $first;
          }, $alldata);
      }

      $result = array(
          'meta' => $meta + array(
                  'sort' => $sort,
                  'field' => $field,
              ),
          'data' => $data
      );

      return $result;
    }

    function list_filter( $list, $args = array(), $operator = 'AND' )
    {
      if ( ! is_array( $list ) ) {
        return array();
      }

      $util = new ListUtil( $list );

      return $util->filter( $args, $operator );
    }
}
