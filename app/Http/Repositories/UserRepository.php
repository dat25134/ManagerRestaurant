<?php
namespace App\Http\Repositories;

use App\Ban;
use App\Hoadon;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        $users = User::all();

        return $users;
    }

    public function getNV($id){
        $user = User::find($id);
        return $user;
    }

    public function editNV($request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image64 = $request->image64;
        $user->save();
        return $user;
    }

    public function delNV($id){
        $user = User::find($id);
        $user->delete();
        return $user;
    }

    public function getBans(){
        $bans = Ban::all();
        $bans = count($bans);

        return $bans;
    }

    public function getBillMonth(){
        $month = date('m-Y');
        $bills = Hoadon::withTrashed()->get();
        $sum=0;
        foreach ($bills as $val){
            if($month == date("m-Y",strtotime($val->ngay_gio_lap))){
                $sum+=$val->total;
            }
        }

        return $sum;
    }

    public function getBillDay(){
        $day = date('d-m-Y');
        $bills = Hoadon::withTrashed()->get();
        $sum=0;
        foreach ($bills as $val){
            if($day == date("d-m-Y",strtotime($val->ngay_gio_lap))){
                $sum+=$val->total;
            }
        }

        return $sum;
    }
}
