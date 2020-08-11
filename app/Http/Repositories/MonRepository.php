<?php
namespace App\Http\Repositories;

use App\Mon;

class MonRepository implements MonRepositoryInterface
{
    public function getAll(){
        $mons = Mon::all();

        return $mons;
    }

    public function create($request){
        $mon = new Mon();
        $mon->tenmon = $request->name;
        $mon->tentienganh = $request->nameEng;
        $mon->gia = $request->gia;
        $mon->nhommons = $request->nhommons;
        $mon->donvitinhs = $request->donvitinhs;
        $mon->save();

        return $mon;
    }

    public function get($id){
        $mon = Mon::find($id);

        return $mon;
    }

    public function edit($request){
        $mon = Mon::find($request->id);
        $mon->tenmon = $request->name;
        $mon->tentienganh = $request->nameEng;
        $mon->gia = $request->gia;
        $mon->nhommons = $request->nhommons;
        $mon->donvitinhs = $request->donvitinhs;
        $mon->save();

        return $mon;
    }

    public function delete($id){
        $mon = Mon::find($id);
        $mon->delete();

        return $mon;
    }
}
