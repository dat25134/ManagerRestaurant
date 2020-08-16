<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FamilyRepositoryInterface;
use App\Http\Requests\CTHDRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class FamilyController extends Controller
{
    protected $familyRepository;

    public function __construct(FamilyRepositoryInterface $familyRepository)
    {
        $this->familyRepository = $familyRepository;
    }

    public function index(){
        $banners = $this->familyRepository->getBanner();
        $mons = $this->familyRepository->getMon();
        $ctkms = $this->familyRepository->getCTKM();
        // return response()->json($ctkms, 200);
        return view('family.index', compact('banners','mons','ctkms'));
    }

    public function order(){
        $mons = $this->familyRepository->getMonAll();
        $nhommons = $this->familyRepository->getNhommons();
        $bans = $this->familyRepository->getBans();

        return view('family.order', compact('mons','nhommons','bans'));
    }

    public function hoaDonAPI($id){
        $hoadons = $this->familyRepository->getBill($id);

        return response()->json($hoadons, 200);
    }

    public function delCTHD($id){
        $cthoadon = $this->familyRepository->delCTHD($id);

        return response()->json($cthoadon, 200);
    }

    public function updateCTHD(CTHDRequest $request){
        $cthoadon = $this->familyRepository->updateCTHD($request);

        return response()->json($cthoadon, 200);
    }

    public function addCTHD(Request $request){
        $cthoadon = $this->familyRepository->addCTHD($request);

        return response()->json($cthoadon, 200);
    }

    public function thanhtoan(Request $request){
        $hoadon = $this->familyRepository->thanhtoan($request);

        return response()->json($hoadon, 200);
    }
}
