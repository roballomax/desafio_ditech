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

    public function update(User $user, Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
        ]);

        dd($user);

        //$this->user->update($user, $request->getAll());
        
        return redirect()->route('user');

    }
    

}
