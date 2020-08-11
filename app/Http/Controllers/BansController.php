<?php

namespace App\Http\Controllers;

use App\Http\Repositories\KhuvucBanRepositoryInterface;
use App\Http\Requests\BanRequest;
use App\Http\Requests\KhuvucBanRequest;
use Illuminate\Http\Request;

class BansController extends Controller
{
    protected $banRepository;

    public function __construct(KhuvucBanRepositoryInterface $banRepository)
    {
        $this->banRepository = $banRepository;
        $this->middleware('auth');
    }

    public function bans(){

        return view('dashboard.quanlyban');
    }

    public function createKVbans(KhuvucBanRequest $request){
        $khuvuc =  $this->banRepository->createKV($request);

        return response()->json($khuvuc, 200);
    }

    public function editKVbans(KhuvucBanRequest $request){
        $khuvuc = $this->banRepository->editKV($request);

        return response()->json($khuvuc, 200);
    }

    public function delKVbans($id){
        $khuvuc = $this->banRepository->delKV($id);

        return response()->json($khuvuc, 200);
    }

    public function createBans(BanRequest $request){
        $ban = $this->banRepository->createBans($request);

        return response()->json($ban, 200);
    }

    public function editBans(BanRequest $request){
        $ban = $this->banRepository->editBan($request);

        return response()->json($ban, 200);
    }

    public function delBans($id){
        $ban = $this->banRepository->delBan($id);

        return response()->json($ban, 200);
    }

    public function APIKVbans(){
        $khuvucs =  $this->banRepository->all();

        return response()->json($khuvucs, 200);
    }


    public function APIgetKVbans($id){
        $khuvuc = $this->banRepository->getKV($id);

        return response()->json($khuvuc, 200);
    }

    public function APIbans($id){
        $bans = $this->banRepository->get($id);

        return response()->json($bans, 200);
    }

    public function APIbansAll(){
        $bans = $this->banRepository->getAllBan();

        return response()->json($bans, 200);
    }

    public function APIgetBans($id){
        $ban = $this->banRepository->getBan($id);

        return response()->json($ban, 200);
    }

}
