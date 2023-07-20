<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_ReportDetailController.php" was generated by ProBot AI.
* Date: 4/5/2023 11:11:51 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ReportDetail;
use App\Models\Report;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ReportDetailController extends Controller{
	public function index(){
		$reportdetails = ReportDetail::paginate(10);
		return view("pages.erp.reportdetail.index",["reportdetails"=>$reportdetails]);
	}
	public function create(){
		return view("pages.erp.reportdetail.create",["reports"=>Report::all(),"projects"=>Project::all()]);
	}
	public function store(Request $request){
		//ReportDetail::create($request->all());
		$reportdetail = new ReportDetail;
		$reportdetail->report_id=$request->report_id;
		$reportdetail->project_id=$request->project_id;
		$reportdetail->project_location=$request->project_location;
		$reportdetail->completed_work=$request->completed_work;
		$reportdetail->remaining_work=$request->remaining_work;
		
date_default_timezone_set("Asia/Dhaka");
		$reportdetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$reportdetail->updated_at=date('Y-m-d H:i:s');

		$reportdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$reportdetail = ReportDetail::find($id);
		return view("pages.erp.reportdetail.show",["reportdetail"=>$reportdetail]);
	}
	public function edit(ReportDetail $reportdetail){
		return view("pages.erp.reportdetail.edit",["reportdetail"=>$reportdetail,"reports"=>Report::all(),"projects"=>Project::all()]);
	}
	public function update(Request $request,ReportDetail $reportdetail){
		//ReportDetail::update($request->all());
		$reportdetail = ReportDetail::find($reportdetail->id);
		$reportdetail->report_id=$request->report_id;
		$reportdetail->project_id=$request->project_id;
		$reportdetail->project_location=$request->project_location;
		$reportdetail->completed_work=$request->completed_work;
		$reportdetail->remaining_work=$request->remaining_work;
		$reportdetail->worker_cost=$request->worker_cost;
		$reportdetail->material_cost=$request->material_cost;
date_default_timezone_set("Asia/Dhaka");
		$reportdetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$reportdetail->updated_at=date('Y-m-d H:i:s');

		$reportdetail->save();

		return redirect()->route("reportdetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(ReportDetail $reportdetail){
		$reportdetail->delete();
		return redirect()->route("reportdetails.index")->with('success', 'Deleted Successfully.');
	}


}
?>