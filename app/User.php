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

    public function update($user, $data){
        $user->name = $data['name'];
        $user->email = $data['email'];

        if(!is_null($data['password']))
            $user->password = bcrypt($data['password']);

        //return $user->save();

    }

}
