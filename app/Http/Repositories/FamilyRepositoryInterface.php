<?php
namespace App\Http\Repositories;

interface FamilyRepositoryInterface
{
    public function getBanner();
    public function getMon();
    public function getMonAll();
    public function getCTKM();
    public function getNhommons();
    public function getBans();
    public function getBill($id);
    public function delCTHD($id);
    public function updateCTHD($request);
    public function addCTHD($request);
    public function thanhtoan($request);
}
