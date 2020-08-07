<?php
namespace App\Http\Repositories;

use App\User;

class UserRepository{

    public function all()
    {
        $users = User::all();

        return $users;
    }

    public function getNV($id){
        $user = User::find($id);
        return $user;
    }

    public function editNV($request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image64 = $request->image64;
        return $user;
    }
}
