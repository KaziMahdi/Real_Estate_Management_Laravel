<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_PayrolDetailController.php" was generated by ProBot AI.
* Date: 5/12/2023 11:40:57 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\PayrolDetail;
use App\Models\Payrol;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PayrolDetailController extends Controller{
	public function index(){
		$payroldetails = PayrolDetail::paginate(10);
		return view("pages.erp.payroldetail.index",["payroldetails"=>$payroldetails]);
	}
	public function create(){
		return view("pages.erp.payroldetail.create",["payrols"=>Payrol::all()]);
	}
	public function store(Request $request){
		//PayrolDetail::create($request->all());
		$payroldetail = new PayrolDetail;
		$payroldetail->payrol_id=$request->payrol_id;
		$payroldetail->basic_salary=$request->basic_salary;
		$payroldetail->house_rent=$request->house_rent;
		$payroldetail->medical_allowance=$request->medical_allowance;
		$payroldetail->conveyance=$request->conveyance;
		$payroldetail->other_allowance=$request->other_allowance;
		$payroldetail->provident_fund=$request->provident_fund;
		$payroldetail->income_tax=$request->income_tax;
		$payroldetail->insurance=$request->insurance;
date_default_timezone_set("Asia/Dhaka");
		$payroldetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$payroldetail->updated_at=date('Y-m-d H:i:s');

		$payroldetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$payroldetail = PayrolDetail::find($id);
		return view("pages.erp.payroldetail.show",["payroldetail"=>$payroldetail]);
	}
	public function edit(PayrolDetail $payroldetail){
		return view("pages.erp.payroldetail.edit",["payroldetail"=>$payroldetail,"payrols"=>Payrol::all()]);
	}
	public function update(Request $request,PayrolDetail $payroldetail){
		//PayrolDetail::update($request->all());
		$payroldetail = PayrolDetail::find($payroldetail->id);
		$payroldetail->payrol_id=$request->payrol_id;
		$payroldetail->basic_salary=$request->basic_salary;
		$payroldetail->house_rent=$request->house_rent;
		$payroldetail->medical_allowance=$request->medical_allowance;
		$payroldetail->conveyance=$request->conveyance;
		$payroldetail->other_allowance=$request->other_allowance;
		$payroldetail->provident_fund=$request->provident_fund;
		$payroldetail->income_tax=$request->income_tax;
		$payroldetail->insurance=$request->insurance;
date_default_timezone_set("Asia/Dhaka");
		$payroldetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$payroldetail->updated_at=date('Y-m-d H:i:s');

		$payroldetail->save();

		return redirect()->route("payroldetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(PayrolDetail $payroldetail){
		$payroldetail->delete();
		return redirect()->route("payroldetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>
