<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    public function index()
    {
        $rolesToExclude = ['USER']; // Roles yang ingin dikecualikan

        $user = User::whereNotIn('role', $rolesToExclude)->get();
        return view('user.index',['user' => $user]);
    }

    public function daftar()
    {
        $user = User::where('role','USER')->get();
        return view('user.daftar',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "email" => "required|email|unique:users",
            "password" => "required|min:6",
            "password_confirmation" => "required|same:password"
        ])->validate();

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = hash::make($request->get('password'));
        $user->role = $request->get('role');
        $user->status = 'INACTIVE';
        $user->save();
        return redirect()->route('user.index')->with('status','User Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "status" => "required",
            "role" => "required",
            "status" => "required",
        ])->validate();

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->role = $request->get('role');
        $user->status = $request->get('status');
        $user->save();
        return redirect()->route('user.index')->with('status','Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('status','data berhasil dihapus');
    }

    public function hapus(Request $request)
{
    $selectedUserIds = $request->input('selectedUsers');
    
    // Ensure that $selectedUserIds is an array and not empty
    if (is_array($selectedUserIds) && count($selectedUserIds) > 0) {
        // Perform the deletion based on the selected user IDs
        // Use whereIn to delete multiple users
        User::whereIn('id', $selectedUserIds)->delete();

        return redirect()->route('user.daftar')->with('status', 'Users deleted successfully');
    }

    return redirect()->route('user.daftar')->with('status', 'No users selected for deletion');
}

    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            if(Auth::user()->role == 'ADMIN'){
                return $next($request);
            }
            return redirect()->guest('/404');
        });
    }
}
