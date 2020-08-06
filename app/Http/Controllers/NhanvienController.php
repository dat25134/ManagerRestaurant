<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanvienController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard.index');
    }

    public function APINhanvien(){
        $users = $this->userRepository->all();
        return response()->json($users);
    }

    public function quanlyNV(){
        return view('dashboard.chitietnhanvien');
    }

    public function dangki(Request $res){
        // dd($res->all());
        $atri = $res->all();

        $data = User::create($atri);

        return response()->json($data, 200);
    }
}
