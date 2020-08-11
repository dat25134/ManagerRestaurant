<?php
namespace App\Http\Repositories;

use App\Khuyenmai;

class CTKMRepository implements CTKMRepositoryInterface
{
    public function getAll(){
        $ctkms = Khuyenmai::all();

        return $ctkms;
    }

    public function create($request){
        $ctkm = new Khuyenmai();
        $ctkm->tenKM = $request->name;
        $ctkm->tungay = $request->tungay;
        $ctkm->denngay = $request->denngay;
        $ctkm->save();

        return $ctkm;
    }

    public function get($id){
        $ctkm = Khuyenmai::find($id);

        return $ctkm;
    }

    public function edit($request){
        $ctkm = Khuyenmai::find($request->id);
        $ctkm->tenKM = $request->name;
        $ctkm->tungay = $request->tungay;
        $ctkm->denngay = $request->denngay;
        $ctkm->save();

        return $ctkm;
    }

    public function delete($id){
        $ctkm = Khuyenmai::find($id);
        $ctkm->delete();

        return $ctkm;
    }

}
