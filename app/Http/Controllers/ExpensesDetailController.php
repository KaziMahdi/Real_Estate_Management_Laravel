<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_ExpensesDetailController.php" was generated by ProBot AI.
* Date: 4/15/2023 2:47:01 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ExpensesDetail;
use App\Models\Project_Task;
use App\Models\Material;
use App\Models\ProjectTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ExpensesDetailController extends Controller{
	public function index(){
		$expensesdetails = ExpensesDetail::paginate(10);
		return view("pages.erp.expensesdetail.index",["expensesdetails"=>$expensesdetails]);
	}
	public function create(){
		return view("pages.erp.expensesdetail.create",["project_tasks"=>ProjectTask::all(),"materials"=>Material::all()]);
	}
	public function store(Request $request){
		//ExpensesDetail::create($request->all());
		$expensesdetail = new ExpensesDetail;
		$expensesdetail->project_task_id=$request->project_task_id;
		$expensesdetail->material_id=$request->material_id;
		$expensesdetail->qty=$request->qty;
		$expensesdetail->uom=$request->uom;

		$expensesdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$expensesdetail = ExpensesDetail::find($id);
		return view("pages.erp.expensesdetail.show",["expensesdetail"=>$expensesdetail]);
	}
	public function edit(ExpensesDetail $expensesdetail){
		return view("pages.erp.expensesdetail.edit",["expensesdetail"=>$expensesdetail,"project_tasks"=>ProjectTask::all(),"materials"=>Material::all()]);
	}
	public function update(Request $request,ExpensesDetail $expensesdetail){
		//ExpensesDetail::update($request->all());
		$expensesdetail = ExpensesDetail::find($expensesdetail->id);
		$expensesdetail->project_task_id=$request->project_task_id;
		$expensesdetail->material_id=$request->material_id;
		$expensesdetail->qty=$request->qty;
		$expensesdetail->uom=$request->uom;

		$expensesdetail->save();

		return redirect()->route("expensesdetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(ExpensesDetail $expensesdetail){
		$expensesdetail->delete();
		return redirect()->route("expensesdetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>