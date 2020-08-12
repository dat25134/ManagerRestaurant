<?php

namespace App\Http\Controllers;

use App\Http\Repositories\FamilyRepositoryInterface;
use Illuminate\Http\Request;

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
}
