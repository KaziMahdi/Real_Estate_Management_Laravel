<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_ExpenseController.php" was generated by ProBot AI.
* Date: 4/15/2023 2:46:27 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Employee;
use App\Models\ExpensesDetail;
use App\Models\Material;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ExpenseController extends Controller{
	public function index(){
		$expenses = DB::table("expenses as x")
		->join("employees as e","x.employee_id","=","e.id")
		->select("x.id","e.name","x.expenses_date","x.remark","x.created_at","x.updated_at")
		->paginate(5);
		return view("pages.erp.expense.index",["expenses"=>$expenses]);
	}
	public function create(){
		return view("pages.erp.expense.create",["employees"=>Employee::all(),"projectTasks"=>ProjectTask::all(),"materials"=>Material::all(),"projects"=>Project::all()]);
	}
	public function store(Request $request){
		//Expense::create($request->all());
		$expense = new Expense;
		$expense->employee_id=$request->textemployee;
		$expense->expenses_date=date("Y-m-d",strtotime($request->txtexpensedate));
		$expense->remark=$request->txtramark;
		

		$expense->save();

		$expnss=$request->detailse;

		foreach($expnss as $expn){

			$detailsexpense=new ExpensesDetail;

			$detailsexpense->expense_id=$expense->id;
			$detailsexpense->project_id=$expn['item_id'];
			$detailsexpense->project_task_id=$expn['pt_id'];
			$detailsexpense->material_id=$expn['m_id'];
			$detailsexpense->qty=$expn['qty'];
			$detailsexpense->uom_id=$expn['u_id'];

			$detailsexpense->save();



		}

		$stock=new Stock();     
      	$stock->material_id=$expn["m_id"];
      	$stock->qty=-$expn["qty"];
      	$stock->uom_id=$expn["u_id"];
      	      	
      	$stock->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$expense = Expense::find($id);
		$employee=Employee::find($expense->employee_id);

		// $exdetails=DB::table("expenses_details")
		// ->where("expense_id",$id)
		// ->get();

		$exdetails=DB::table("expenses_details as e")
		->join("projects as p","e.project_id","=","p.id")
		->join("project_tasks as t","e.project_task_id","=","t.id")
		->join("materials as m","e.material_id","=","m.id")
		->join("uoms as u","e.uom_id","=","u.id")
		->where("e.expense_id",$id)
		->select("e.*","p.name as pname","t.name as tname","m.name as mname","u.name as uname")
		->get();

		return view("pages.erp.expense.show",["expense"=>$expense,"employee"=>$employee,"exdetails"=>$exdetails]);
	}
	public function edit(Expense $expense){
		return view("pages.erp.expense.edit",["expense"=>$expense,"employees"=>Employee::all()]);
	}
	public function update(Request $request,Expense $expense){
		//Expense::update($request->all());
		$expense = Expense::find($expense->id);
		$expense->employee_id=$request->employee_id;
		$expense->expenses_date=$request->expenses_date;
		$expense->remark=$request->remark;
		$expense->total=$request->total;

		$expense->save();

		return redirect()->route("expenses.index")->with('success','Updated Successfully.');
	}
	public function destroy(Expense $expense){
		$expense->delete();
		return redirect()->route("expenses.index")->with('success', 'Deleted Successfully.');
	}

public function get_expense_json(){
	
}


}
?>
