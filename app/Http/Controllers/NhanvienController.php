<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanvienController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        if (Auth::user()){
            return view('dashboard.index');
        }else {
            return redirect('/login');
        }

    }

    public function APINhanvien(){
        $users = $this->userRepository->all();
        return response()->json($users);
    }

    public function quanlyNV(){
        return view('dashboard.chitietnhanvien');
    }
}
