<?php
namespace App\Http\Repositories;

use App\Ctkhuyenmai;

class CuponRepository implements CuponRepositoryInterface
{
    public function getAll(){
        $cupons = Ctkhuyenmai::with('khuyenmai:id,tenKM','mon:id,tenmon,nhommons')->get();

        return $cupons;
    }

    public function create($request){
        $cupon = new Ctkhuyenmai();
        $cupon->id_khuyenmais = $request->CTKM;
        $cupon->id_mons = $request->tenmon;
        $cupon->save();

        return $cupon;
    }

    public function get($id){
        $cupon = Ctkhuyenmai::with('khuyenmai:id,tenKM','mon:id,tenmon')->find($id);

        return $cupon;
    }

    public function edit($request){
        $cupon = Ctkhuyenmai::find($request->id);
        $cupon->id_khuyenmais = $request->CTKM;
        $cupon->id_mons = $request->tenmon;
        $cupon->save();

        return $cupon;
    }

    public function delete($id){
        $cupon = Ctkhuyenmai::find($id);
        $cupon->delete();

        return $cupon;
    }
}
