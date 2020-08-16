<?php
namespace App\Http\Repositories;

use App\Hoadon;

class BillRepository implements BillRepositoryInterface
{
    public function getAllBill(){
        $bills = Hoadon::withTrashed()->with('ban:id,tenban','user:id,name')->get();

        return $bills;
    }

    public function getBill($id){
        $getBill = Hoadon::withTrashed()->find($id);
        $bill = [];
        $bill['id_bans'] = $getBill->id_bans;
        $bill['id_hoadons'] = $getBill->id;
        $bill['vats'] = $getBill->vats;
        $bill['chitiet'] = [];
        foreach ($getBill->cthoadons as $ct){
            $km = $ct->mon->ctkhuyenmais;
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


    public function getBillDay($request){
        $bills = Hoadon::withTrashed()->with('ban:id,tenban','user:id,name')->where('ngay_gio_lap','like',$request->day.'%')->get();

        return $bills;
    }
}
