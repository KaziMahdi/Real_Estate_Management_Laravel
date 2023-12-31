<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_MonthController.php" was generated by ProBot AI.
* Date: 5/20/2023 11:44:59 PM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Month;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class MonthController extends Controller{
	public function index(){
		$months = Month::paginate(10);
		return view("pages.erp.month.index",["months"=>$months]);
	}
	public function create(){
		return view("pages.erp.month.create",[]);
	}
	public function store(Request $request){
		//Month::create($request->all());
		$month = new Month;
		$month->name=$request->name;

		$month->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$month = Month::find($id);
		return view("pages.erp.month.show",["month"=>$month]);
	}
	public function edit(Month $month){
		return view("pages.erp.month.edit",["month"=>$month,]);
	}
	public function update(Request $request,Month $month){
		//Month::update($request->all());
		$month = Month::find($month->id);
		$month->name=$request->name;

		$month->save();

		return redirect()->route("months.index")->with('success','Updated Successfully.');
	}
	public function destroy(Month $month){
		$month->delete();
		return redirect()->route("months.index")->with('success', 'Deleted Successfully.');
	}
}
?>
