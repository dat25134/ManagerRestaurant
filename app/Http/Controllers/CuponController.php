<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CuponRepositoryInterface;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    protected $cuponRepository;

    public function __construct(CuponRepositoryInterface $cuponRepository)
    {
        $this->cuponRepository = $cuponRepository;
        $this->middleware('auth');
    }

    public function cuponIndex(){
        return view('dashboard.chitietkhuyenmai');
    }

    public function cuponAPI(){
        $cupons = $this->cuponRepository->getAll();

        return response()->json($cupons, 200);
    }
}
