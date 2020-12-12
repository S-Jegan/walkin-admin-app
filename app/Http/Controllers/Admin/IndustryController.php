<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Industry;
use Illuminate\Http\Request;
use Auth;
use File;
use Session;
use Hash;
class IndustryController extends Controller
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
        return view('admin.add-industry');
    }
	public function store(Request $request)
    {
		Industry::create($request->all());
		
	  Session::flash('success', 'Industry created successfully!');
	  return redirect('industry-list');
		
	}
	public function show(Request $request)
    {
		$data['industry'] = Industry::where('is_active',1)->get();
		 return view('admin.industry-list',$data);
	}
	 public function destroy($id)
    {
	   Industry::where('id',$id)->update(['is_active'=>0]);
	    Session::flash('success', 'Deleted successfully!');
		return back();	
    }
	public function edit($id)
    {
        $industry = Industry::where('id',$id)->first();
        return view('admin.edit-industry', ['industry' => $industry]);  
    }
	public function update(Request $request, $id)
    {
        Industry::where('id',$id)->update($request->all());

		 Session::flash('success', 'Updated successfully!');
		 
		return redirect('industry-list');
    }
	
}
