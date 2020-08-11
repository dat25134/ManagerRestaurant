<?php
namespace App\Http\Repositories;

use App\Ban;
use App\Http\Requests\KhuvucBanRequest;
use App\Khuvuc;

class KhuvucBanRepository implements KhuvucBanRepositoryInterface
{

    public function all()
    {
        $khuvucs = Khuvuc::with('bans:id,id_khuvucs')->get();

        return $khuvucs;
    }

    public function getKV($id){
        $khuvuc = Khuvuc::find($id);

        return $khuvuc;
    }

    public function createKV($request){
        $khuvuc = new Khuvuc();
        $khuvuc->Tenkhuvuc = $request->name;
        $khuvuc->save();

        return $khuvuc;
    }
    public function editKV($request){
        $khuvuc = Khuvuc::find($request->id);
        $khuvuc->Tenkhuvuc = $request->name;
        $khuvuc->save();

        return $khuvuc;
    }

    public function delKV($id){
        $khuvuc = Khuvuc::find($id);
        $khuvuc->delete();

        return $khuvuc;
    }

    public function get($id){
        $bans = Ban::where('id_khuvucs',$id)
                                            ->with('Khuvuc') ->get();

        return $bans;
    }

    public function getAllBan(){
        $bans = Ban::with('khuvuc:id,Tenkhuvuc')->get();

        return $bans;
    }


    public function createBans($request){
        $khuvuc = Khuvuc::find($request->id_khuvucs);
        $ban = new Ban();
        $ban->ma_ban = $request->name;
        $ban->tenban = $khuvuc->Tenkhuvuc . $request->name;
        $ban->soghe = $request->soghe;
        $ban->id_khuvucs = $request->id_khuvucs;
        $ban->save();

        return $ban;
    }

    public function getBan($id){
        $ban = Ban::find($id);

        return $ban;
    }

    public function editBan($request){
        $khuvuc = Khuvuc::find($request->id_khuvucs);
        $ban = Ban::find($request->id);
        $ban->ma_ban = $request->name;
        $ban->tenban = $khuvuc->Tenkhuvuc . $request->name;
        $ban->soghe = $request->soghe;
        $ban->id_khuvucs = $request->id_khuvucs;
        $ban->save();

        return $ban;
    }

    public function delBan($id){
        $ban = Ban::find($id);
        $ban->delete();

        return $ban;
    }
}
