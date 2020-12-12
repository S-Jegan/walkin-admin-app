<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Model\WalkinInterviewDetails;
use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
class FilterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
	 
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        /* print_r($request->all());
		exit; */
		
		$interview = WalkinInterviewDetails::where('is_active',1)->with(['company','industry:id,name','department:id,name']);
		if(count($request->location)>0){
			$interview->whereIn('location',$request->location);
		}
		if(count($request->keywords)>0){
		$interview->where(function($query) use ($request){
			
			foreach($request->keywords as $val){
				       $query->where('location','like', '%' . $val . '%');
                       $query->orWhere('job_description','like', '%' . $val . '%');
                       $query->orWhere('skills','like', '%' . $val . '%');
                       $query->orWhere('designation','like', '%' . $val . '%');
                       $query->orWhere('qualification','like', '%' . $val . '%');
					}
				});
		}
		if($request->salary != ""){
			$interview->whereRaw('? between salary_start and salary_end', [$request->salary]);
		}
		if($request->experience != ""){
		$interview->whereRaw('? between exp_start and exp_end', [$request->experience]);
		}
		$interviewClone = clone $interview;
		$result = $interview->get();
		$response = $this->customFilterGenerate($interviewClone);
		return $response;
		exit;
		return $data;
		
		exit;
    }
	public function customFilterGenerate($interviewClone){
		
		$filter = WalkinInterviewDetails::where('is_active',1);
		$customResponce =[];
		$data['salary'] = [[
		'name'=>'0 - 3 Lacs',
		'count'=> $filter->whereRaw('salary_start > 0 and salary_end < 300000')->count(),
		'is_filter'=> '',
		],
		['name'=>'3 - 5 Lacs',
		'count'=> $filter->whereRaw('salary_start >= 300000 and salary_end < 500000')->count(),
		'is_filter'=> '',
		],
		['name'=>'5 - 8 Lacs',
		'count'=> $filter->whereRaw('salary_start >= 500000 and salary_end < 800000')->count(),
		'is_filter'=> '',
		],
		['name'=>'8 - 10 Lacs',
		'count'=> $filter->whereRaw('salary_start >= 800000 and salary_end < 1000000')->count(),
		'is_filter'=> '',
		],
		['name'=>'10 - 15 Lacs',
		'count'=> $filter->whereRaw('salary_start >= 1000000 and salary_end < 1500000')->count(),
		'is_filter'=> '',
		],
		['name'=>'15 - 20 Lacs',
		'count'=> $filter->whereRaw('salary_start >= 1500000 and salary_end < 2000000')->count(),
		'is_filter'=> '',
		],
		['name'=>'20+ Lacs',
		'count'=> $filter->whereRaw('salary_start >= 2000000')->count(),
		'is_filter'=> '',
		],
		];
		$ttt= $interviewClone->groupby('location')->distinct()->get();
		
		print_r($ttt->toArray());
		exit;
		return $data;
		/* foreach($filter as $key => $value){
			if($value->salary_start > 0 && $value->salary_end < 300000){
				
			}
		} */
	}
	
}
