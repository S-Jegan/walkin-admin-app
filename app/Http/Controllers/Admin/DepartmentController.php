<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Department;
use Illuminate\Http\Request;
use Auth;
use File;
use Session;
use Hash;
class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
	 
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-department');
    }
	public function store(Request $request)
    {
		Department::create($request->all());
		
	  Session::flash('success', 'Department created successfully!');
	  return redirect('department-list');
		
	}
	public function show(Request $request)
    {
		$data['department'] = Department::where('is_active',1)->get();
		 return view('admin.department-list',$data);
	}
	 public function destroy($id)
    {
	   Department::where('id',$id)->update(['is_active'=>0]);
	    Session::flash('success', 'Deleted successfully!');
		return back();	
    }
	public function edit($id)
    {
        $department = Department::where('id',$id)->first();
        return view('admin.edit-department', ['department' => $department]);  
    }
	public function update(Request $request, $id)
    {
     
        Department::where('id',$id)->update($request->all());
		 Session::flash('success', 'Updated successfully!');
		 
		return redirect('department-list');
    }
	
}
