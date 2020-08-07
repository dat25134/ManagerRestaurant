<?php
namespace App\Http\Repositories;

use App\User;

interface UserRepositoryInterface{

    public function all();
    public function getNV($id);
    public function editNV($request);
    public function delNV($id);
}
