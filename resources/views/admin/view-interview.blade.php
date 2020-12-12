@include('admin.header')
<div class="main-container">
   <div class="container-fluid">
      <div class="page-breadcrumb">
         <div class="row">
            <div class="col-md-7">
               <div class="page-breadcrumb-wrap">
                  <div class="page-breadcrumb-info">
                     <h2 class="breadcrumb-titles">Manage WalkIn <small>View WalkIn</small></h2>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
            </div>
         </div>
      </div>
      @if(Session::has('success')||Session::has('fail'))
      <div class="alert @if(Session::has('success')) alert-success @else alert-danger @endif " role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         @if(Session::has('success')){{ Session::get('success') }} @else {{ Session::get('fail') }} @endif
      </div>
      @endif
      <div class="row">
         <div class="col-md-12">
            <div class="box-widget widget-module">
               <div class="widget-head clearfix">
                  <span class="h-icon"><i class="fa fa-bars"></i></span>
                  <h4>View WalkIn</h4>
               </div>
               <div class="widget-container">
                  <div class=" widget-block">
                     <form class=" form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="company_name1">Comapany name</label>
                           <div class=" col-md-7">
                                 @php $company = App\Model\Company::where('id',$interview->company_id)->first();
                                 @endphp 
							  <input readonly class="form-control" id="cname" value="{{ $company->name }}" name="company_name" type="text" >
                           </div>
                        </div>
                        <!--<div class="form-group">
							         <label class="col-md-3 control-label" for="cname">FCM image</label>
								      <div class="col-lg-7">
									         <img width="50%" src="{{$interview->fcm_url}}"  />
								      </div>
						</div> -->
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Industry</label>
                           <div class=" col-md-7">
                                 @php $industry = App\Model\Industry::where('id',$interview->industry_id)->first();
                                 @endphp 
                              <input readonly class="form-control" value="{{ $industry->name}}" id="cname" name="industry_id" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Category</label>
                           <div class=" col-md-7">
                                 @php $category = App\Model\Category::where('id',$interview->category_id)->first();
                                 @endphp 
                              <input readonly class="form-control" value="{{ $category->name }}" id="cname" name="dept_id" type="text" >
                           </div>
                        </div> 
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Designation</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control" value="{{ $interview->designation}}" id="cname" name="designation" type="text" >
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Skills</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control" value="{{ $interview->skills }}" id="cname" name="skills" type="text" >
                           </div>
                        </div>
						
						<div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Qualification</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->qualification}}" id="cname" name="qualification" type="text" >
                           </div>
						   <label class="col-md-1 control-label" for="cname">Type</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->work_mode }}" id="cname" name="source" type="text" >
                           </div>
                        </div>
						
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Interview Attendees</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->audience }}" id="cname" name="source" type="text" >
                           </div>
                           <label class="col-md-1 control-label" for="cname">Vacancies</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->vacancies }}" id="cname" name="source" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Experience Start</label>
                           <div class=" col-md-3">
                               <input readonly class="form-control" value="{{ $interview->exp_start }}" id="cname" name="source" type="text" >
                           </div>
                           <label class="col-md-1 control-label" for="cname"> End</label>
                           <div class=" col-md-3">
                               <input readonly class="form-control" value="{{ $interview->exp_end }}" id="cname" name="source" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Salary Start</label>
                           <div class=" col-md-3">
                               <input readonly class="form-control" value="{{ $interview->salary_start }}" id="cname" name="source" type="text" >
                           </div>
                           <label class="col-md-1 control-label" for="cname"> End</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->salary_end }}" id="cname" name="source" type="text" >
                           </div>
						   
						   <div class=" col-md-2">
                              <input readonly class="form-control" value="{{ $interview->salary_type }}" id="cname" name="source" type="text" >
                           </div>
						   
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Interview Start Date</label>
                           <div class=" col-md-3">
                              <div class="input-group date addon-datepicker" >
                                 <input readonly class="form-control" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $interview->interview_start_date)->format('m/d/Y') }}" id="cname" name="interview_start_date" type="text" >
                                 <span class="input-group-addon">
                                 <i class="glyphicon glyphicon-th"></i>
                                 </span>
                              </div>
                           </div>
                           <label class="col-md-1 control-label" for="cname"> End</label>
                           <div class=" col-md-3">
                              <div class="input-group date addon-datepicker" >
                                 <input readonly class="form-control" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $interview->interview_end_date)->format('m/d/Y') }}" id="cname" name="interview_end_date" type="text" >
                                 <span class="input-group-addon">
                                 <i class="glyphicon glyphicon-th"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Interview Location</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->location }}" id="cname" name="location" type="text" >
                           </div>
                           <label class="col-md-1 control-label" for="cname">State</label>
                           <div class=" col-md-3">
                              <input readonly class="form-control" value="{{ $interview->state }}" id="cname" name="source" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Job Description </label>
                           <div class=" col-md-7">
                              {!! $interview->job_description !!}
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Walkin Location </label>
                           <div class=" col-md-7">
                              {!! $interview->	walkin_address !!}
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Contact Details </label>
                           <div class=" col-md-7">
                              {!! $interview->	contact_details !!}
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Other Info </label>
                           <div class=" col-md-7">
                              {!! $interview->	other_info !!}
                           </div>
                        </div> 
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Source</label>
                           <div class=" col-md-7">
                             <input readonly class="form-control" value="{{ $interview->source }}" id="cname" name="source" type="text" >
                           </div>
                        </div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="cname">Job Verified :</label>
							<div class="col-md-7">
								<input readonly class="form-control" value="{{ $interview->is_verified == 0 ? 'No' : 'Yes'  }}" id="cname" name="source" type="text" >
						
							</div>
						</div>
                        
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Footer Start Here -->
@include('admin.footerck')