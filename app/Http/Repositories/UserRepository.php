<?php
namespace App\Http\Repositories;

use App\User;

class UserRepository{

    public function all()
    {
        $users = User::all();

        return $users;
    }
}
