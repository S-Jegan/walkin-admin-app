<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Admin_model;
use Illuminate\Http\Request;
use App\Model\WalkinInterviewDetails;
use Auth;
use Session;
use Carbon\Carbon;
use Hash;
use DB;
class AdminController extends Controller
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
		$today = Carbon::today()->toDateString();
		$today_walkins=WalkinInterviewDetails::where('is_active',1)
		->whereRaw('? BETWEEN INTERVIEW_START_DATE AND INTERVIEW_END_DATE',[$today])->count();
		
        $active_walkins=WalkinInterviewDetails::where('is_active',1)
        ->whereDate('interview_end_date', '>=', $today)
        ->count();

        $posted_today=WalkinInterviewDetails::where('is_active',1)
        ->whereDate('interview_end_date', '>=', $today)
		->whereDate('created_at', '=', $today) 
        ->count();

        $total_views = DB::table("interviews")->sum('no_of_views');

        $data = [
            'today_walkins'  => $today_walkins,
            'active_walkins'   => $active_walkins,
            'posted_today'  => $posted_today,
            'total_views'  => $total_views
        ];
         
        return view('admin.dashboard',$data);
    }
	public function change_password()
    {
        return view('admin.change-password');
    }
	public function profile()
    {
        return view('admin.profile');
    }
	public function add_state()
    {
        return view('admin.add-state');
    }
	
	public function change_password_post(Request $request)
    {
		 $input = $request->all();
		 if($input['password']==$input['re_password'])
		 {
		 $update = Admin_model::where('id', Auth::user()->id)->update(['password' => Hash::make($input['password'])]);
			Session::flash('success', 'Updated successfully!');
		 }
		 else
		 {
			Session::flash('fail', 'Password not match please try again!');
		 }
       return redirect()->back(); 
    }
}
