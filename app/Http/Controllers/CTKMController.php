<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CTKMRepositoryInterface;
use App\Http\Requests\CTKMRequest;
use Illuminate\Http\Request;

class CTKMController extends Controller
{
    protected $ctkmRepository;

    public function __construct(CTKMRepositoryInterface $ctkmRepository)
    {
        $this->ctkmRepository = $ctkmRepository;
        $this->middleware('auth');
    }
    public function ctkmIndex(){

        return view('dashboard.quanlyCupon');
    }

    public function createCTKM(CTKMRequest $request){
        $ctkm = $this->ctkmRepository->create($request);

        return response()->json($ctkm, 200);
    }

    public function editCTKM(CTKMRequest $request){
        $ctkm = $this->ctkmRepository->edit($request);

        return response()->json($ctkm, 200);
    }

    public function delCTKM($id){
        $ctkm = $this->ctkmRepository->delete($id);

        return response()->json($ctkm, 200);
    }

    public function ctkmsAPI(){
        $ctkms = $this->ctkmRepository->getAll();

        return response()->json($ctkms, 200);
    }

    public function getCTKMAPI($id){
        $ctkm = $this->ctkmRepository->get($id);

        return response()->json($ctkm, 200);
    }
}
