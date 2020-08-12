<?php
namespace App\Http\Repositories;

use App\Banner;
use App\Khuyenmai;
use App\Mon;

class FamilyRepository implements FamilyRepositoryInterface
{
    public function getBanner()
    {
        $banners = Banner::all();

        return $banners;
    }

    public function getMon()
    {
        $mons = Mon::all()->random(8);

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
}
