<?php
/*** This app/http/EmployeeDesignationController.php file was generated by ProBot AI
 Date:4/2/2023 12:02:45 AM ***/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\EmployeeDesignation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class EmployeeDesignationController extends Controller{
	public function index(){
		
		// $employeedesignations = DB::table('employee_designations')->select('*')->paginate(10);
		$employeedesignations = EmployeeDesignation::paginate(5);
		return view("pages.erp.designation.manage",["employeedesignations"=>$employeedesignations]);
	}
	public function create(){
		return view("pages.erp.designation.create");
	}
	public function store(Request $request){
		//EmployeeDesignation::create($request->all());
		$employeedesignation = new EmployeeDesignation;
		$employeedesignation->name=$request->txtName;

		$employeedesignation->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$employeedesignation = EmployeeDesignation::find($id);
		return view("pages.erp.designation.detailes",["employeedesignation"=>$employeedesignation]);
	}

	public function edit($id,EmployeeDesignation $employeedesignation ){
		

		return view("pages.erp.designation.edit",["id"=>$id,"employeedesignation"=>$employeedesignation]);
	}

	public function update(Request $request,EmployeeDesignation $employeedesignation){
		//EmployeeDesignation::update($request->all());

		$employeedesignation = EmployeeDesignation::find($employeedesignation->id);

		$employeedesignation->name=$request->txtName;

		$employeedesignation->save();

		return redirect()->route("designation.index")->with('success','Updated Successfully.');
	}

	public function destroy($id){

		$employeedesignation=EmployeeDesignation::find($id);
		$employeedesignation->delete();
		return redirect()->route("designation.index")->with('success', 'Deleted Successfully.');
	}
}
?>
