<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Auth;
use File;
use Session;
use Hash;

class CategoryController extends Controller
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
        return view('admin.add-category');
    }

    public function store(Request $request)
    {
        if($request->file('img_url')){
            $destinationPath ='public/category'; // upload path
            $extension = $request->file('img_url')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('img_url')->move($destinationPath, $fileName); // uploading file to given path
            $img_url=['img_url'=>$fileName];
            }else{
            $img_url="";
            }
        $insertData=array_merge($request->all(),$img_url);
        Category::create($insertData);
	    Session::flash('success', 'Category created successfully!');
	    return redirect('category-list');
		
    }
    
    public function update(Request $request, $id)
    {
        $oldData = Category::findOrFail($id);
        $destinationPath ='public/category'; // upload path
        if($request->file('img_url') && $request->img_url!=""){
            File::delete('public/category/'.$oldData->img_url);
            $destinationPath ='public/category'; // upload path
            $extension = $request->file('img_url')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('img_url')->move($destinationPath, $fileName); // uploading file to given path
            $img_url=['img_url'=>$fileName];
        }
        else{
            $img_url=['img_url'=> basename(parse_url($oldData->img_url, PHP_URL_PATH))];
        }

        $updateData=array_merge($request->all(),$img_url);
      
        Category::where('id',$id)->update($updateData);
		Session::flash('success', 'Category updated successfully!');
		return redirect('category-list');
    }

    public function show(Request $request)
    {
		$data['categories'] = Category::where('is_active',1)->get();
		 return view('admin.category-list',$data);
	}
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        return view('admin.edit-category', ['category' => $category]);  
    }
    
    public function destroy($id)
    {
        Category::where('id',$id)->update(['is_active'=>0]);
	    Session::flash('success', 'Category Deleted successfully!');
		return back();	
    }

}
