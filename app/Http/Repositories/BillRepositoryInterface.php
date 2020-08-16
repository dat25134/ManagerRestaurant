<?php
namespace App\Http\Repositories;

interface BillRepositoryInterface
{
    public function getAllBill();
    public function getBill($id);
    public function getBillDay($request);
}
