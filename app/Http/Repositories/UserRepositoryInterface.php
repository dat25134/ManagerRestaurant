<?php
namespace App\Http\Repositories;


interface UserRepositoryInterface{

    public function all();
    public function getNV($id);
    public function editNV($request);
    public function delNV($id);

    public function getBans();
    public function getBillMonth();
    public function getBillDay();
}
