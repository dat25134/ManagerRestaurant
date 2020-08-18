<?php
namespace App\Http\Repositories;

use App\Ban;
use App\Banner;
use App\Cthoadon;
use App\Hoadon;
use App\Khuyenmai;
use App\Mon;
use Illuminate\Support\Facades\Auth;

class FamilyRepository implements FamilyRepositoryInterface
{
    public function getBanner()
    {
        $banners = Banner::all();

        return $banners;
    }

    public function getMon()
    {
        $mons = Mon::all();

        return $mons;
    }

    public function getMonAll()
    {
        $mons = Mon::all();

        return $mons;
    }

    public function getCTKM(){
        $ctkms = Khuyenmai::all();
        $dataGlobal=[];
        foreach ($ctkms as $item){
            $data['tenKM']= $item->tenKM;
            $data['ngaybd']= $item->tungay;
            $data['ngaykt']= $item->denngay;
            $data['phantramKM']=$item->phantramKM;
            $data['imageURL']=$item->imageURL;
            $data['mons']['tenmon']=[];
            $data['mons']['nhommon']=[];
            foreach ($item->ctkhuyenmais as $val){
                array_push($data['mons']['tenmon'],$val->mon->tenmon);
                array_push($data['mons']['nhommon'],$val->mon->nhommons);
            }
            array_push($dataGlobal,$data);
        }

        $page = array_chunk($dataGlobal,3);


        return $page;
    }

    public function getNhommons()
    {
        $nhommons = Mon::select('nhommons')->distinct('nhommons')->get();

        return $nhommons;
    }

    public function getBans()
    {
        $bans = Ban::all();

        return $bans;
    }

    public function getBill($id){
        $getBill = Hoadon::where('id_bans',$id)->first();
        if ($getBill==null){
            $getBill = new Hoadon();
            $getBill->id_users = Auth::user()->id;
            $getBill->id_bans = $id;
            $getBill->save();
        }
        $bill = [];
        $bill['id_bans'] = $getBill->id_bans;
        $bill['id_hoadons'] = $getBill->id;
        $bill['vats'] = $getBill->vats;
        $bill['chitiet'] = [];
        foreach ($getBill->cthoadons as $ct){
            $km = $ct->mon->ctkhuyenmais;
            // dd($km, 200);
            if(count($km)>0){
                $km = $ct->mon->ctkhuyenmais[0]->khuyenmai->phantramKM;
            }else{
                $km=0;
            };
            $chitiet = [
                'id' => $ct->id,
                'tenmon' => $ct->mon->tenmon,
                'gia' => $ct->mon->gia,
                'donvi' => $ct->mon->donvitinhs,
                'soluong' => $ct->soluong,
                // dd($ct->mon->ctkhuyenmais[0]->khuyenmai->phantramKM, 200),
                'km' => $km,
            ];
            array_push($bill['chitiet'],$chitiet);
        }

        return $bill;
    }

    public function delCTHD($id){
        $cthoadon = Cthoadon::find($id);
        $cthoadon->delete();

        return $cthoadon;
    }

    public function updateCTHD($request){
        $cthoadon = Cthoadon::find($request->id);
        $cthoadon->soluong = $request->soluong;
        $cthoadon->update();

        return $cthoadon;
    }

    public function addCTHD($request){
        $cthoadon = new Cthoadon();
        $cthoadon->soluong = 1;
        $cthoadon->id_mons = $request->id_mons;
        $cthoadon->id_hoadons = $request->id_hoadons;
        $cthoadon->save();

        return $cthoadon;
    }

    public function thanhtoan($request){
        $hoadon = Hoadon::find($request->id);
        $hoadon->total = $request->total;
        $hoadon->update();
        $hoadon->delete();
        $hoadon->giothanhtoan = $hoadon->deleted_at;
        $hoadon->update();

        return $hoadon;
    }
}
