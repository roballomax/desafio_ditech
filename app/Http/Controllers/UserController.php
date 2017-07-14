<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    
    }

    public function index(){

        $users = new User();
        
        return view('user.index', [
            'users' => $users->getAll()
        ]);
    }

    public function edit(User $user){
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function create(Request $request){
        return view('user.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $this->user->create_user($request->all());
        return redirect()->route('user.index');
    }

    public function update(User $user, Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $this->user->update_user($user, $request->all());
        
        return redirect()->route('user.index');
    }

    public function destroy(User $user){
        $this->user->destroy_user($user);
        return redirect()->route('user.index');
    }
    

}
