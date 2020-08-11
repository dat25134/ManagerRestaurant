<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MonRepositoryInterface;
use App\Http\Requests\MonRequest;
use Illuminate\Http\Request;

class MonController extends Controller
{
    protected $monRepository;

    public function __construct(MonRepositoryInterface $monRepository)
    {
        $this->monRepository = $monRepository;
        $this->middleware('auth');
    }

    public function monsIndex(){

        return view('dashboard.quanlymons');
    }

    public function createMon(MonRequest $request){
        $mon = $this->monRepository->create($request);

        return response()->json($mon,200);

    }

    public function delMon($id){
        $mon = $this->monRepository->delete($id);

        return response()->json($mon,200);
    }

    public function editMon(MonRequest $request){
        $mon = $this->monRepository->edit($request);

        return response()->json($mon,200);
    }

    public function monsAPI(){
        $mons = $this->monRepository->getAll();

        return response()->json($mons,200);
    }

    public function getMonAPI($id){
        $mon = $this->monRepository->get($id);

        return response()->json($mon,200);
    }

}
