<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanvienController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function quanlyNV(){

        return view('dashboard.chitietnhanvien');
    }

    public function APINhanvien(){
        $users = $this->userRepository->all();

        return response()->json($users);
    }

    public function APINhanvienID($id){
        $user = $this->userRepository->getNV($id);

        return response()->json($user);
    }

    public function APIupdateID(RegisterRequest $request){
        $user = $this->userRepository->editNV($request);

       return response()->json($user);
    }

    public function APIdelID($id){
        $user = $this->userRepository->delNV($id);

       return response()->json($user);
    }
}
