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

    }

    public function get($id){

    }

    public function edit($request){

    }

    public function delete($id){

    }
}
