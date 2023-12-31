<?php
/*
* ProBot Version: 3.0
* Laravel Version: 10x
* Description: This source file "app/Http/_UserController.php" was generated by ProBot AI.
* Date: 5/16/2023 1:09:00 AM
* Contact: towhid1@outlook.com
*/
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class UserController extends Controller{
	public function index(){
		$users = User::paginate(10);
		return view("pages.erp.user.index",["users"=>$users]);
	}
	public function create(){
		return view("pages.erp.user.create",[]);
	}
	public function store(Request $request){
		//User::create($request->all());
		$user = new User;
		$user->username=$request->username;
		$user->password=$request->password;
		$user->email=$request->email;
		$user->mobile=$request->mobile;
date_default_timezone_set("Asia/Dhaka");
		$user->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$user->updated_at=date('Y-m-d H:i:s');

		$user->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$user = User::find($id);
		return view("pages.erp.user.show",["user"=>$user]);
	}
	public function edit(User $user){
		return view("pages.erp.user.edit",["user"=>$user,]);
	}
	public function update(Request $request,User $user){
		//User::update($request->all());
		$user = User::find($user->id);
		$user->username=$request->username;
		$user->password=$request->password;
		$user->email=$request->email;
		$user->mobile=$request->mobile;
date_default_timezone_set("Asia/Dhaka");
		$user->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$user->updated_at=date('Y-m-d H:i:s');

		$user->save();

		return redirect()->route("users.index")->with('success','Updated Successfully.');
	}
	public function destroy(User $user){
		$user->delete();
		return redirect()->route("users.index")->with('success', 'Deleted Successfully.');
	}
}
?>
