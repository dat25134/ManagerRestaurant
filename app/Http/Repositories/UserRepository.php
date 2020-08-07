<?php
namespace App\Http\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{

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
        $user->save();
        return $user;
    }

    public function delNV($id){
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
