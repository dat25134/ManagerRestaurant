<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CuponRepositoryInterface;
use App\Http\Requests\CuponRequest;
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

    public function createCupon(CuponRequest $request){
        $cupon = $this->cuponRepository->create($request);

        return response()->json($cupon, 200);
    }

    public function getCuponAPI($id){
        $cupon = $this->cuponRepository->get($id);

        return response()->json($cupon, 200);
    }

    public function editCupon(CuponRequest $request){
        $cupon = $this->cuponRepository->edit($request);

        return response()->json($cupon, 200);
    }

    public function delCupon($id){
        $cupon = $this->cuponRepository->delete($id);

        return response()->json($cupon, 200);
    }
}
