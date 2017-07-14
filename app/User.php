<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAll(){
        return User::orderBy('name', 'asc')->get();
    }

    public function create_user($data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function update_user($user, $data){
        $user->name = $data['name'];
        $user->email = $data['email'];

        if(!is_null($data['password']))
            $user->password = bcrypt($data['password']);

        return $user->save();

    }

    public function destroy_user($user){
        return $user->delete();
    }

}
