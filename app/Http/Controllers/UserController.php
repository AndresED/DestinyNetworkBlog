<?php

namespace DestinyH\Http\Controllers;

use Illuminate\Http\Request;
use DestinyH\Http\Requests\LoginRequest;
use DestinyH\Http\Requests\RegisterRequest;
use DB;
use Auth;
use DestinyH\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin')->except(['login','register', 'updateThink']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::OrderBy('created_at','desc')->paginate(12);
        return view('admin.views.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.views.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_login' => 'required|string|min:6|max:20|unique:users',
            'user_email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|',
            'user_gender' => ['required', Rule::in(['masculino', 'femenino'])],
        ]);
        try {
            $user = new User();
            $user->user_login = $request->user_login;
            $user->password = bcrypt($request->password);
            $user->user_email = $request->user_email;
            $user->user_gender = $request->user_gender;
            $user->user_rol = $request->user_rol;
            $user->user_birth = $request->user_birth;
            $user->user_nicename = $request->user_login;
            $user->user_country = "Unknown";
            $user->user_about = "";
            $user->user_pub = 1;
            $user->save();
        } catch (\Exception $e) {
            abort(500);
        }
        $request->session()->flash('registered', 'succeed');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::findBySlug($slug);
        $comments = User::findBySlug($slug)->comments()->get();
        return view('portal.views.profile', compact('user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.views.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_login' => 'string|min:6|max:20',
            'user_email' => 'email',
        ]);
        try {
            $user = User::find($id);
            $user->user_login = $request->user_login;
            $user->user_email = $request->user_email;
            if ($request->password){$user->password = bcrypt($request->password);}
            if ($request->user_gender){$user->user_gender = $request->user_gender;}
            if ($request->user_rol){$user->user_rol = $request->user_rol;}
            if ($request->user_birth){$user->user_birth = $request->user_birth;}
            $user->save();
        } catch (\Exception $e) {
            abort(500);
        }
        $request->session()->flash('updated', 'succeed');
        return redirect()->action('UserController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            abort(500);
        }
        \Session::flash('deleted', 'succeed');
        return redirect()->back();
    }

    public function updateThink(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:users',
            'user_think' => 'string|required',
        ]);
        try {
            $user = User::find($request->id);
            $user->user_think = $request->user_think;
            $user->save();
        } catch (\Exception $e) {
            abort(500);
        }
        return redirect()->back();
    }
    public function searchUser($nicename)
    {
        $search="%".$nicename."%";
        $users = DB::table('users')
                ->select('users.*')->where([
                      ['user_nicename', 'like', $search],
                  ])->get();
        return response()->json($users);
    }
}
