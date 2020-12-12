<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\WalkinInterviewDetails;
use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
use Auth;
use DB;
use Session;
use Response;
use Hash;
use Carbon\Carbon;
class InterviewController  extends Controller
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
		$data['interviews']=WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->orderBy('interview_start_date','ASC')->get();
        return view('admin.interview-list',$data); 
    }
	
	/**
	* TODAY'S WALKIN LIST
	*/
	public function today()
    {
		$today = Carbon::today()->toDateString();
        $data['interviews']=WalkinInterviewDetails::where('is_active',1)
		->whereRaw('? BETWEEN INTERVIEW_START_DATE AND INTERVIEW_END_DATE',[$today])
		->orderBy('interview_start_date','ASC')
		->get();         
        return view('admin.interview-list',$data);
    }
	 
	/**
	* TOMORROW'S WALKIN LIST
	*/
	public function tomorrow()
    {
		 $tomorrow = Carbon::tomorrow()->toDateString();
         $data['interviews'] = WalkinInterviewDetails::where('is_active',1)
		->whereRaw('? BETWEEN INTERVIEW_START_DATE AND INTERVIEW_END_DATE',[$tomorrow])
		->orderBy('interview_start_date','ASC')
        ->get();
        return view('admin.interview-list',$data);
    }
	
	/**
	* IN-ACTIVE WALKIN LIST 
	*/
	public function inactive()
    {
		$today = Carbon::today()->toDateString();
        $data['interviews']=WalkinInterviewDetails::where('is_active',0)
        ->whereDate('interview_end_date', '>=', $today)
        ->orderBy('interview_start_date','ASC')->get();       
        return view('admin.interview-list',$data);
    }
	
	/**
	* EXPIRED WALKIN LIST 
	*/
	public function expired()
    {
		$today = Carbon::today()->toDateString();
        $data['interviews']=WalkinInterviewDetails::where('is_active',1)
        ->whereDate('interview_end_date', '<', $today)
        ->orderBy('interview_start_date','ASC')->get();       
        return view('admin.interview-list',$data);
    }
	
	/**
	* ARCHIVED WALKIN LIST 
	*/
	public function archived()
    {
		$today = Carbon::today()->toDateString();
        $data['interviews']=WalkinInterviewDetails::where('is_active',0)
        ->whereDate('interview_end_date', '<', $today)
        ->orderBy('interview_start_date','ASC')->get();       
        return view('admin.interview-list',$data);
    }
	
    public function create()
    {
        return view('admin.add-interview');
    }
	 public function store(Request $request)
    {

        $input = $request->all();
        if($request['interview_start_date']!="")
		 $request->merge(['interview_start_date'=>Carbon::createFromFormat('m/d/Y', $request['interview_start_date'])->format('Y-m-d  H:i:s')]);
		if($request['interview_end_date']!="")
         $request->merge(['interview_end_date'=>Carbon::createFromFormat('m/d/Y', $request['interview_end_date'])->format('Y-m-d  H:i:s')]);
        
        $company=Company::where('id',$request['company_id'])->first();
        $request->merge(['industry_id'=>$company->industry_id]);
		$request->merge(['created_by'=>Auth::user()->name]);
        $insertData=array_merge($request->all());
       
	  WalkinInterviewDetails::create($insertData);
	  Session::flash('success', 'Interview created successfully!');
	  return redirect('interview/list');
	   
	}
	
	
	 public function destroy($id)
    {
	
	   WalkinInterviewDetails::where('id',$id)->update(['is_active'=>0]);
	    Session::flash('success', 'Deleted successfully!');
		return back();	
    }
	public function edit($id)
    {
        $interview = WalkinInterviewDetails::where('id',$id)->first();
        return view('admin.edit-interview', ['interview' => $interview]);  
    }
	public function viewInterview($id)
    {
        $interview = WalkinInterviewDetails::where('id',$id)->first();
        return view('admin.view-interview', ['interview' => $interview]);  
    }
	public function update(Request $request, $id)
    {
       $oldData = WalkinInterviewDetails::findOrFail($id);
		 $input = $request->all();
        if($request['interview_start_date']!="")
		 $request->merge(['interview_start_date'=>Carbon::createFromFormat('m/d/Y', $request['interview_start_date'])->format('Y-m-d  H:i:s')]);
		if($request['interview_end_date']!="")
         $request->merge(['interview_end_date'=>Carbon::createFromFormat('m/d/Y', $request['interview_end_date'])->format('Y-m-d  H:i:s')]);
	 
        $request->merge(['updated_by'=>Auth::user()->name]);

        //$request->merge(['is_verified'=>($request->is_verified == "true") ? true : false]);

        $updateData=array_merge($request->all());
      
        WalkinInterviewDetails::where('id',$id)->update($updateData);

		 Session::flash('success', 'Updated successfully!');
		 
		return redirect('interview/list');
    }

    public function register_view_events()
    {
		//$input=Input::all();
		
    	 $data['event_register'] = DB::table('event_register')
        ->join('users', 'users.id', '=', 'event_register.user_id')
        ->join('events', 'events.id', '=', 'event_register.event_id')
        ->select('users.*','events.*','event_register.created_at AS register_date')
        ->get();

        return view('admin.events.Register-view-events',$data);
    }
	public function datefilter()
    {
		//$input=Input::all();
		$data['event_register'] = DB::table('event_register')
        ->join('users', 'users.id', '=', 'event_register.user_id')
        ->join('events', 'events.id', '=', 'event_register.event_id')
        ->select('users.*','events.*','event_register.created_at AS register_date')
        ->whereMonth('event_register.created_at',12)->get();
		  //return view('admin.events.Register-view-events',$data);
		 $html = view('admin.events.datefilter', $data)->render();
		return response()->json( array('success' => true, 'html'=>$html) );
    }

    public function fcm($id)
    {
		
        $interview = WalkinInterviewDetails::where('id',$id)->first();
		$company=Company::where('id',$interview->company_id)->first();
        // print_r( $interview->toArray());
        // exit;
        // print_r($interview->fcm_img_url);
        // exit;
		$message['data']['id'] = $interview->id;
        $message['data']['company'] = $company->name;
		$message['data']['logo'] = $company->logo;
        $message['data']['designation'] = $interview->designation; 
		//$message['data']['notification'] = Array ( 'click_action'=> "com.gotoapps.walkin.activities.WalkinsActivity") ;
        //$message['data']['is_background'] = false;
        //$message['data']['image'] = $interview->fcm_img_url;
        //$message['data']['payload'] = Array ( 'id'=> $interview->id) ;
        //$message['data']['timestamp'] = date('Y-m-d G:i:s');
        $fields = array(
                'to' => '/topics/global',
                'data' => $message,
            );
		$interview->fcm_indicator=1;;
		$interview->save();
        return $this->sendPushNotification($fields);
    }
   
     private function sendPushNotification($fields) {
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . env('FIREBASE_API_KEY',''),
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
        Session::flash('success', 'FCM message sent successfully!');
        return back();
    }
	 function getIndustry(Request $request){
		 Industry::find($request->id);
		 
	 }

}
