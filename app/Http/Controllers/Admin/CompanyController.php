<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Company;
use Illuminate\Http\Request;
use Auth;
use File;
use Session;
use Hash;
class CompanyController extends Controller
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
        return view('admin.add-company');
    }
	public function store(Request $request)
    {
		if($request->file('logo')){
		$destinationPath ='public/company'; // upload path
		$extension = $request->file('logo')->getClientOriginalExtension(); // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$request->file('logo')->move($destinationPath, $fileName); // uploading file to given path
        $logo=['logo'=>$fileName];
		}else{
        $logo="";
        }
		$insertData=array_merge($request->all(),$logo);
		Company::create($insertData);
		
	  Session::flash('success', 'Company created successfully!');
	  return redirect('company-list');
		
	}
	public function show(Request $request)
    {
		$data['companies'] = Company::where('is_active',1)->get();
		 return view('admin.company-list',$data);
	}
	 public function destroy($id)
    {
	   Company::where('id',$id)->update(['is_active'=>0]);
	    Session::flash('success', 'Deleted successfully!');
		return back();	
    }
	public function edit($id)
    {
        $company = Company::where('id',$id)->first();
        return view('admin.edit-company', ['company' => $company]);  
    }
	public function update(Request $request, $id)
    {
       $oldData = Company::findOrFail($id);
		 $input = $request->all();

		$destinationPath ='public/company'; // upload path
        if($request->file('logo') && $request->logo!=""){
		File::delete('public/company/'.$oldData->logo);
	    $destinationPath ='public/company'; // upload path
		$extension = $request->file('logo')->getClientOriginalExtension(); // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$request->file('logo')->move($destinationPath, $fileName); // uploading file to given path
        $logo=['logo'=>$fileName];
		}else{
        $logo=['logo'=> basename(parse_url($oldData->logo, PHP_URL_PATH))];
        }
	          
        $updateData=array_merge($request->all(),$logo);
      
        Company::where('id',$id)->update($updateData);

		Session::flash('success', 'Updated successfully!');
		 
		return redirect('company-list');
    }
    
    public function viewCompany($id)
    {
        $company = Company::where('id',$id)->first();
        return view('admin.view-company', ['company' => $company]);  
    }
}
