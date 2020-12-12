<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Resume;
use Illuminate\Http\Request;
use Auth;
use File;
use Session;
use Hash;
class ResumeController extends Controller
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
        return view('admin.add-resume');
    }
	public function store(Request $request)
    {
		if($request->file('word_url')){
		$destinationPath ='public/resume'; // upload path
		$extension = $request->file('word_url')->getClientOriginalExtension(); // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$request->file('word_url')->move($destinationPath, $fileName); // uploading file to given path
        $word_url=['word_url'=>$fileName];
		}else{
        $word_url="";
        }
		 if($request->file('pdf_url')){
        $destinationPath ='public/resume'; // upload path
		$extension = $request->file('pdf_url')->getClientOriginalExtension(); // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$request->file('pdf_url')->move($destinationPath, $fileName); // uploading file to given path
        $pdf_url=['pdf_url'=>$fileName];
		}else{
        $pdf_url="";
        }
		$insertData=array_merge($request->all(),$word_url,$pdf_url);
		Resume::create($insertData);
		
	  Session::flash('success', 'Resume created successfully!');
	  return redirect('resume-list');
		
	}
	public function show(Request $request)
    {
		$data['resume'] = Resume::where('is_active',1)->get();
		 return view('admin.resume-list',$data);
	}
	 public function destroy($id)
    {
	   Resume::where('id',$id)->update(['is_active'=>0]);
	    Session::flash('success', 'Deleted successfully!');
		return back();	
    }
	public function edit($id)
    {
        $resume = Resume::where('id',$id)->first();
        return view('admin.edit-resume', ['resume' => $resume]);  
    }
	public function update(Request $request, $id)
    {
       $oldData = Resume::findOrFail($id);
		 $input = $request->all();

		$destinationPath ='public/resume'; // upload path
        if($request->file('word_url') && $request->word_url!=""){
		File::delete('public/resume/'.$oldData->word_url);
	    $destinationPath ='public/resume'; // upload path
		$extension = $request->file('word_url')->getClientOriginalExtension(); // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$request->file('word_url')->move($destinationPath, $fileName); // uploading file to given path
        $word_url=['word_url'=>$fileName];
		}else{
        $word_url=['word_url'=> basename(parse_url($oldData->word_url, PHP_URL_PATH))];
        }
	   
        if($request->file('pdf_url') && $request->pdf_url!=""){
		File::delete('public/resume/'.$oldData->pdf_url);
	    $destinationPath ='public/resume'; // upload path
		$extension = $request->file('pdf_url')->getClientOriginalExtension(); // getting image extension
		$fileName = rand(11111,99999).'.'.$extension; // renameing image
		$request->file('pdf_url')->move($destinationPath, $fileName); // uploading file to given path
        $pdf_url=['pdf_url'=>$fileName];
		}else{
        $pdf_url=['pdf_url'=> basename(parse_url($oldData->pdf_url, PHP_URL_PATH))];
     
        }
        
        $updateData=array_merge($request->all(),$word_url,$pdf_url);
      
        Resume::where('id',$id)->update($updateData);

		 Session::flash('success', 'Updated successfully!');
		 
		return redirect('resume-list');
    }
	
}
