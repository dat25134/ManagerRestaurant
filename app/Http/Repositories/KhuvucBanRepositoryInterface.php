<?php
namespace App\Http\Repositories;

interface KhuvucBanRepositoryInterface{

    public function all();
    public function getKV($id);
    public function createKV($request);
    public function editKV($request);
    public function delKV($id);
    public function get($id);
    public function getAllBan();
    public function createBans($request);
    public function getBan($id);
    public function editBan($id);
    public function delBan($id);

}
