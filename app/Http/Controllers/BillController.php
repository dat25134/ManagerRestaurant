<?php

namespace App\Http\Controllers;

use App\Http\Repositories\BillRepositoryInterface;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $billRepository;

    public function __construct(BillRepositoryInterface $billRepository)
    {
        $this->billRepository = $billRepository;
        $this->middleware('auth');
    }

    public function index(){

        return view('dashboard.thongkebill');
    }

    public function billsAPI(){
        $bills = $this->billRepository->getAllBill();

        return response()->json($bills, 200);
    }

    public function getBillsAPI($id){
        $bills = $this->billRepository->getBill($id);

        return response()->json($bills, 200);
    }

    public function getBillDay(Request $request){
        $bills = $this->billRepository->getBillDay($request);

        return response()->json($bills, 200);
    }
}
