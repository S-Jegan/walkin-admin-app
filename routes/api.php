<?php

use Illuminate\Http\Request;
use App\Model\WalkinInterviewDetails;
use App\Model\Resume;
use App\Model\Industry;
use App\Model\Property;
use App\Model\Category;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/user', function (Request $request) {
//     echo "asfas";
// })->middleware('auth:api');

	/*
	|--------------------------------------------------------------------------
	| INTERVIEWS LISTING API
	|--------------------------------------------------------------------------
	*/

	Route::group(['prefix' => 'v1'], function () {
	
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW BASIC SEARCH
	|--------------------------------------------------------------------------
	*/
	 Route::post('interviews/search', function (Request $request) {
		$keywords='';
		$data = str_replace(',', '|', $request->keywords);
		foreach ($data as $value){
			$keywords .= $value.'|';
		}
		$today = Carbon::today()->toDateString();
		$keywords = substr($keywords,0,-1);
		$keywords = "\"".$keywords."\"";
		$interview = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->whereRaw("(skills REGEXP {$keywords} OR designation REGEXP {$keywords})");
	
		if($request->location){
			$data = str_replace(',', '|', $request->location);
			$locations='';
			foreach ($data as $value){
				$locations .= $value.'|';
			}
			$locations = substr($locations,0,-1);
			$locations = "\"".$locations."\"";
			$interview = $interview -> whereRaw("(location REGEXP {$locations})");
		}
	
		if($request->experience){
			$interview->whereRaw('? between exp_start and exp_end', [$request->experience]);
		}
		if($request->salary){
		   	$interview->whereRaw('? between salary_start and salary_end', [$request->salary]);
		}
		$response = $interview->orderBy('interview_start_date','DESC')
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
	 	return $response;
	});
	
	/*
	|--------------------------------------------------------------------------
	| LOCATION  WESERVICES - LIST OF JOB LOCATIONS AVAILABLE
	|--------------------------------------------------------------------------
	*/
	Route::get('locations', function () {
	$today = Carbon::today()->toDateString();
    $response = WalkinInterviewDetails::select('location','state',DB::raw('count(*) as total'))
	->where('is_active',1)->whereDate('interview_end_date', '>=', $today)
	->groupBy('location','state')->orderBy('location','ASC')->get();
    return $response;
	});
	
	/* 
	|--------------------------------------------------------------------------
	| KEYWORDS  WESERVICES - KEYWORDS AVAILABLE IN WALKINN SYSTEM
	|--------------------------------------------------------------------------
	*/
	Route::get('keywords', function () {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::select('skills','designation')->where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)->get();
		return $response;
	});

	/*
	|--------------------------------------------------------------------------
	| RESUME  WESERVICES - LIST OF RESUMES AVAILABLE
	|--------------------------------------------------------------------------
	*/
	Route::get('resumes', function () {
    $response = Resume::where('is_active',1)
	->with(['category'])->orderBy('created_at','DESC')->paginate(70);
    return $response;
    });
	
	/*
	|--------------------------------------------------------------------------
	| RESUME  WESERVICES - RESUME DOWNLOAD INCREMENT
	|--------------------------------------------------------------------------
	*/
	Route::get('resume/add-download/{id}', function ($id) {	
	$downloads = Resume::where('id',$id)->first();
	$downloads->downloads = ($downloads->downloads+1);
	$downloads->save();
	$response = Resume::where('is_active',1)->where('id',$id)->get();
    return $response;
    }); 
	
	/*
	|--------------------------------------------------------------------------
	| INDUSTRY  WESERVICES - LIST OF INDUSTRIES AVAILABLE 
	|--------------------------------------------------------------------------
	*/
	Route::get('industries', function () {
    $response = Industry::select('id','name')->where('is_active',1)->orderBy('id','ASC')->get();
    return $response;
    });
	
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW LIST WITH FILTER
	|--------------------------------------------------------------------------
	*/
	Route::post('interview/filter/','Api\FilterController@filter');

	/*
	|--------------------------------------------------------------------------|
	| RETRIEVE THE PROPERTIES												   |
	|--------------------------------------------------------------------------|
	*/
	Route::get('properties', function () {
		$response = Property::where('is_active',1)->orderBy('created_at','ASC')->get();
		return $response;
		
	});

	/*
	|--------------------------------------------------------------------------|
	| RETRIEVE THE CATEGORIES												   |
	|--------------------------------------------------------------------------|
	*/
	Route::get('categories', function () {
		$response = Category::where('is_active',1)->orderBy('name','ASC')->get();
		return $response;
	});

	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY CATEGORY ID
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/category/{id}', function ($id,Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)->where('category_id',$id)
		->whereDate('interview_end_date', '>=', $today)
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
		});
	
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY MULTIPLE CATEGORY ID's
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/many-category/ids', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereIn('category_id',$request->ids)
		->whereDate('interview_end_date', '>=', $today)
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
		});


	/*
	|--------------------------------------------------------------------------|
	| RETRIEVE ALL INTERVIEWS												   |
	|--------------------------------------------------------------------------|
	*/
	Route::post('interviews', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->orderBy('interview_start_date','DESC')
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
	});
 
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY INDUSTRY ID
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/industry/{id}', function ($id,Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)->where('industry_id',$id)
		->whereDate('interview_end_date', '>=', $today)
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
		});
	
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY COMPANY ID
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/company/{id}', function ($id,Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)->where('company_id',$id)
		->whereDate('interview_end_date', '>=', $today)
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
	});

	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY ID
	|--------------------------------------------------------------------------
	*/
	Route::get('interview/{id}', function ($id) {
		$viewcount = WalkinInterviewDetails::where('id',$id)->where('is_active',1)->first();
		$viewcount->no_of_views = ($viewcount->no_of_views+1);
		$viewcount->save();
		$response = WalkinInterviewDetails::where('is_active',1)->where('id',$id)->with(['company','industry:id,name'])->get();
		return $response;
		});
		
	
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY ID
	|--------------------------------------------------------------------------
	*/
	Route::get('interview/details/{id}', function ($id) {
		$url = "https://play.google.com/store/apps/details?id=com.gotoapps.walkin&hl=en";
		return Redirect::to($url);
	});

	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY MULTIPLE ID's
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/ids', function (Request $request) {
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereIn('id',$request->ids)->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
		});
	
	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY LOCATION NAME
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/location/{locationName}', function ($locationName,Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->where('location','like', '%' . $locationName. '%')
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
	});

	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY VERIFIED INDICATOR
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/verified', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->where('is_verified',1)->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
	});

	/*
	|--------------------------------------------------------------------------
	| INTERVIEW DETAILS BY VISA SPONSORED JOBS
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/visa-sponsored', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->where('is_visa_sponsored',1)->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
	});

	 
	/*
	|--------------------------------------------------------------------------
	| INTERVIEWS GOT ADDED NEWLY 
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/new', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->whereDate('created_at', '=', $today) 
		->with(['company','industry:id,name'])->orderBy('interview_start_date','ASC')
		->paginate($request->per_page,['*'], 'page', $request->page);
		/*->take(50);
		$collection = collect($response->get());
		$page = $request->page;
		$perPage = $request->per_page;
		$response = new LengthAwarePaginator($collection->forPage($page, $perPage),
		$collection->count(), $perPage, $page,['path'=>url('api/v1/interviews/new')]);*/
		return $response;
	  });
	
	/*
	|--------------------------------------------------------------------------
	| TODAY WALKINS
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/today', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereRaw('? BETWEEN INTERVIEW_START_DATE AND INTERVIEW_END_DATE',[$today])
		->with(['company','industry:id,name'])->orderBy('interview_start_date','ASC')
		->paginate($request->per_page,['*'], 'page', $request->page);
 		return $response;
	  });
	
	/*
	|--------------------------------------------------------------------------
	| TOMORROW WALKINS
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/tomorrow', function (Request $request) {
		$tomorrow = Carbon::tomorrow()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereRaw('? BETWEEN INTERVIEW_START_DATE AND INTERVIEW_END_DATE',[$tomorrow])
		->with(['company','industry:id,name'])->orderBy('interview_start_date','ASC')
		->paginate($request->per_page,['*'], 'page', $request->page);
 		return $response;
	});

	/*
	|--------------------------------------------------------------------------
	| FRESHER WALKINS
	|--------------------------------------------------------------------------
	*/
	Route::post('interviews/freshers', function (Request $request) {
		$today = Carbon::today()->toDateString();
		$response = WalkinInterviewDetails::where('is_active',1)
		->whereDate('interview_end_date', '>=', $today)
		->whereRaw('(audience in ("Freshers","Both") or exp_start=0 or category_id=14)')
		->with(['company','industry:id,name'])
		->paginate($request->per_page,['*'], 'page', $request->page);
		return $response;
	});
	 
	/*
	|--------------------------------------------------------------------------
	| ADD INTERVIEW SHARE COUNT
	|--------------------------------------------------------------------------
	*/
	Route::get('interview/add/sharecount/{id}', function ($id) {
		$sharecount = WalkinInterviewDetails::where('id',$id)->where('is_active',1)->first();
		$sharecount->no_of_shares = ($sharecount->no_of_shares+1);
		$sharecount->save();
		$response = WalkinInterviewDetails::where('is_active',1)->where('id',$id)->with(['company','industry:id,name'])->get();
		return $response;
		});
		

});