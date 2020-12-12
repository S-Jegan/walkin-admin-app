@include('admin.header')
<div class="main-container">
   <div class="container-fluid">
      <div class="page-breadcrumb">
         <div class="row">
            <div class="col-md-7">
               <div class="page-breadcrumb-wrap">
                  <div class="page-breadcrumb-info">
                     <h2 class="breadcrumb-titles">Manage WalkIn <small>Edit WalkIn</small></h2>
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
                  <h4>Edit WalkIn</h4>
               </div>
               <div class="widget-container">
                  <div class=" widget-block">
                    <form class=" form-horizontal" action="{{URL::to('interview/update',$interview->id)}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="company_name1">Comapany name</label>
                           <div class=" col-md-7">
                             
							<select required name="company_id" class="form-control select2">
									@php
									$company = App\Model\Company::where('is_active',1)->get();
									@endphp
										<option value="" >--SELECT--</option>
										@foreach($company as $value)
										<option @if($value->id == $interview->company_id) selected @endif  value="{{ $value->id }}">{{ $value->name }}</option>@endforeach												
							</select>
												
                           </div>
                        </div>
                        <!--<div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Notification Image</label>
                           <div class="col-lg-7">
                              <input  type="file" class="form-control" name="fcm_url"/>
                              <span class="help-block">Choose a image file size 780pxX286px.</span>
                           </div>
                        </div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="cname"></label>
								<div class="col-lg-7">
									<img width="30%" src="{{$interview->fcm_url}}"  />
								</div>
						</div> -->

						
						<div class="form-group">
								<label class="col-md-3 control-label" for="cname">Category</label>
								<div class=" col-md-7">
								 
								   <select required name="category_id" class="form-control select2">
										 @php
										 $category = App\Model\Category::where('is_active',1)->get();
										 @endphp
											 <option value="" >--SELECT--</option>
											 @foreach($category as $value)
											 <option @if($value->id == $interview->category_id) selected @endif  value="{{ $value->id }}">{{ $value->name }}</option>@endforeach												
								 </select>
								 
								</div>
						</div>
                        
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Designation</label>
                           <div class=" col-md-7">
                              <input class="form-control" value="{{ $interview->designation }}" id="cname" name="designation" type="text" >
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Skills</label>
                           <div class=" col-md-7">
                              <input class="form-control" value="{{ $interview->skills }}" id="cname" name="skills" type="text" >
                           </div>
                        </div>
						
						<div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Qualification</label>
                           <div class=" col-md-3">
                              <input class="form-control" value="{{ $interview->qualification }}" id="cname" name="qualification" type="text" >
                           </div>
						   <label class="col-md-1 control-label" for="cname">Type</label>
                           <div class=" col-md-3">
                             
							<select name="work_mode" class="form-control">
								<option value="" >--SELECT--</option>
									<option @if($interview->work_mode=="Full Time") selected @endif value="Full Time">Full Time</option>
									<option  @if($interview->work_mode=="Part Time") selected @endif value="Part Time">Part Time</option>
									<option  @if($interview->work_mode=="Contract") selected @endif value="Contract">Contract</option>
									<option  @if($interview->work_mode=="Freelance") selected @endif value="Freelance">Freelance</option>
							</select>
												
                           </div>
                        </div>
						
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Interview Attendees</label>
                           <div class=" col-md-3">
							  <select name="audience" class="form-control">
								<option value="" >--SELECT--</option>
									<option @if($interview->audience=="Freshers") selected @endif value="Freshers">Freshers</option>
									<option  @if($interview->audience=="Experienced") selected @endif value="Experienced">Experienced</option>
									<option  @if($interview->audience=="Both") selected @endif value="Both">Both</option>
									
							  </select>
							
                           </div>
                           <label class="col-md-1 control-label" for="cname">Vacancies</label>
                           <div class=" col-md-3">
                              <select name="vacancies" class="form-control select2">
								<option value="" >Not Disclosed</option>
									<option @if($interview->vacancies=="1") selected @endif value="1">1</option>
									<option @if($interview->vacancies=="2") selected @endif value="2">2</option>
									<option @if($interview->vacancies=="3") selected @endif value="3">3</option>
									<option @if($interview->vacancies=="4") selected @endif value="4">4</option>
									<option @if($interview->vacancies=="5") selected @endif value="5">5</option>
									<option @if($interview->vacancies=="6") selected @endif value="6">6</option>
									<option @if($interview->vacancies=="7") selected @endif value="7">7</option>
									<option @if($interview->vacancies=="8") selected @endif value="8">8</option>
									<option @if($interview->vacancies=="9") selected @endif value="9">9</option>
									<option @if($interview->vacancies=="10") selected @endif value="10">10</option>
									<option @if($interview->vacancies=="11") selected @endif value="11">11</option>
									<option @if($interview->vacancies=="12") selected @endif value="12">12</option>
									<option @if($interview->vacancies=="13") selected @endif value="13">13</option>
									<option @if($interview->vacancies=="14") selected @endif value="14">14</option>
									<option @if($interview->vacancies=="15") selected @endif value="15">15</option>
									<option @if($interview->vacancies=="16") selected @endif value="16">16</option>
									<option @if($interview->vacancies=="17") selected @endif value="17">17</option>
									<option @if($interview->vacancies=="18") selected @endif value="18">18</option>
									<option @if($interview->vacancies=="19") selected @endif value="19">19</option>
									<option @if($interview->vacancies=="20") selected @endif value="20">20</option>
							</select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Experience Start</label>
                           <div class=" col-md-3">
                            <select name="exp_start" class="form-control select2">
									<option value="" >--SELECT--</option>
									<option @if($interview->exp_start=="0") selected @endif value="0">0</option>
									<option @if($interview->exp_start=="1") selected @endif value="1">1</option>
									<option @if($interview->exp_start=="2") selected @endif value="2">2</option>
									<option @if($interview->exp_start=="3") selected @endif value="3">3</option>
									<option @if($interview->exp_start=="4") selected @endif value="4">4</option>
									<option @if($interview->exp_start=="5") selected @endif value="5">5</option>
									<option @if($interview->exp_start=="6") selected @endif value="6">6</option>
									<option @if($interview->exp_start=="7") selected @endif value="7">7</option>
									<option @if($interview->exp_start=="8") selected @endif value="8">8</option>
									<option @if($interview->exp_start=="9") selected @endif value="9">9</option>
									<option @if($interview->exp_start=="10") selected @endif value="10">10</option>
									<option @if($interview->exp_start=="11") selected @endif value="11">11</option>
									<option @if($interview->exp_start=="12") selected @endif value="12">12</option>
									<option @if($interview->exp_start=="13") selected @endif value="13">13</option>
									<option @if($interview->exp_start=="14") selected @endif value="14">14</option>
									<option @if($interview->exp_start=="15") selected @endif value="15">15</option>
									<option @if($interview->exp_start=="16") selected @endif value="16">16</option>
									<option @if($interview->exp_start=="17") selected @endif value="17">17</option>
									<option @if($interview->exp_start=="18") selected @endif value="18">18</option>
									<option @if($interview->exp_start=="19") selected @endif value="19">19</option>
									<option @if($interview->exp_start=="20") selected @endif value="20">20</option>
							</select>   
							  
                           </div>
                           <label class="col-md-1 control-label" for="cname"> End</label>
                           <div class=" col-md-3">
                            <select name="exp_end" class="form-control select2">
									<option value="" >--SELECT--</option>
									<option @if($interview->exp_end=="0") selected @endif value="0">0</option>
									<option @if($interview->exp_end=="1") selected @endif value="1">1</option>
									<option @if($interview->exp_end=="2") selected @endif value="2">2</option>
									<option @if($interview->exp_end=="3") selected @endif value="3">3</option>
									<option @if($interview->exp_end=="4") selected @endif value="4">4</option>
									<option @if($interview->exp_end=="5") selected @endif value="5">5</option>
									<option @if($interview->exp_end=="6") selected @endif value="6">6</option>
									<option @if($interview->exp_end=="7") selected @endif value="7">7</option>
									<option @if($interview->exp_end=="8") selected @endif value="8">8</option>
									<option @if($interview->exp_end=="9") selected @endif value="9">9</option>
									<option @if($interview->exp_end=="10") selected @endif value="10">10</option>
									<option @if($interview->exp_end=="11") selected @endif value="11">11</option>
									<option @if($interview->exp_end=="12") selected @endif value="12">12</option>
									<option @if($interview->exp_end=="13") selected @endif value="13">13</option>
									<option @if($interview->exp_end=="14") selected @endif value="14">14</option>
									<option @if($interview->exp_end=="15") selected @endif value="15">15</option>
									<option @if($interview->exp_end=="16") selected @endif value="16">16</option>
									<option @if($interview->exp_end=="17") selected @endif value="17">17</option>
									<option @if($interview->exp_end=="18") selected @endif value="18">18</option>
									<option @if($interview->exp_end=="19") selected @endif value="19">19</option>
									<option @if($interview->exp_end=="20") selected @endif value="20">20</option>
							</select>                                   
                                                                        
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Salary Start</label>
                           <div class=" col-md-3">
                            <select name="salary_start" class="form-control select2">
					<option value="" >--SELECT--</option>
					<option @if($interview->salary_start=="5000") selected @endif value="5000">5000</option>
					<option @if($interview->salary_start=="10000") selected @endif value="10000">10000</option>
					<option @if($interview->salary_start=="15000") selected @endif value="15000">15000</option>
					<option @if($interview->salary_start=="20000") selected @endif value="20000">20000</option>
					<option @if($interview->salary_start=="25000") selected @endif value="25000">25000</option>
					<option @if($interview->salary_start=="30000") selected @endif value="30000">30000</option>
					<option @if($interview->salary_start=="35000") selected @endif value="35000">35000</option>
					<option @if($interview->salary_start=="40000") selected @endif value="40000">40000</option>
					<option @if($interview->salary_start=="45000") selected @endif value="45000">45000</option>
					<option @if($interview->salary_start=="50000") selected @endif value="50000">50000</option>
					<option @if($interview->salary_start=="55000") selected @endif value="55000">55000</option>
					<option @if($interview->salary_start=="60000") selected @endif value="60000">60000</option>
					<option @if($interview->salary_start=="65000") selected @endif value="65000">65000</option>
					<option @if($interview->salary_start=="70000") selected @endif value="70000">70000</option>
					<option @if($interview->salary_start=="75000") selected @endif value="75000">75000</option>
					<option @if($interview->salary_start=="80000") selected @endif value="80000">80000</option>
					<option @if($interview->salary_start=="85000") selected @endif value="85000">85000</option>
					<option @if($interview->salary_start=="90000") selected @endif value="90000">90000</option>
					<option @if($interview->salary_start=="100000") selected @endif value="100000">100000</option>
					<option @if($interview->salary_start=="150000") selected @endif value="150000">150000</option>
					<option @if($interview->salary_start=="200000") selected @endif value="200000">200000</option>
					<option @if($interview->salary_start=="250000") selected @endif value="250000">250000</option>
					<option @if($interview->salary_start=="300000") selected @endif value="300000">300000</option>
					<option @if($interview->salary_start=="350000") selected @endif value="350000">350000</option>
					<option @if($interview->salary_start=="400000") selected @endif value="400000">400000</option>
					<option @if($interview->salary_start=="450000") selected @endif value="450000">450000</option>
					<option @if($interview->salary_start=="500000") selected @endif value="500000">500000</option>
					<option @if($interview->salary_start=="550000") selected @endif value="550000">550000</option>
					<option @if($interview->salary_start=="600000") selected @endif value="600000">600000</option>
					<option @if($interview->salary_start=="650000") selected @endif value="650000">650000</option>
					<option @if($interview->salary_start=="700000") selected @endif value="700000">700000</option>
					<option @if($interview->salary_start=="750000") selected @endif value="750000">750000</option>
					<option @if($interview->salary_start=="800000") selected @endif value="800000">800000</option>
					<option @if($interview->salary_start=="850000") selected @endif value="850000">850000</option>
					<option @if($interview->salary_start=="900000") selected @endif value="900000">900000</option>
					<option @if($interview->salary_start=="950000") selected @endif value="950000">950000</option>
					<option @if($interview->salary_start=="1000000") selected @endif value="1000000">1000000</option>
						</select>  
                           </div>
                           <label class="col-md-1 control-label" for="cname"> End</label>
                           <div class=" col-md-3">
                              	<select name="salary_end" class="form-control select2">
					<option value="" >--SELECT--</option>
					<option @if($interview->salary_end=="5000") selected @endif value="5000">5000</option>
					<option @if($interview->salary_end=="10000") selected @endif value="10000">10000</option>
					<option @if($interview->salary_end=="15000") selected @endif value="15000">15000</option>
					<option @if($interview->salary_end=="20000") selected @endif value="20000">20000</option>
					<option @if($interview->salary_end=="25000") selected @endif value="25000">25000</option>
					<option @if($interview->salary_end=="30000") selected @endif value="30000">30000</option>
					<option @if($interview->salary_end=="35000") selected @endif value="35000">35000</option>
					<option @if($interview->salary_end=="40000") selected @endif value="40000">40000</option>
					<option @if($interview->salary_end=="45000") selected @endif value="45000">45000</option>
					<option @if($interview->salary_end=="50000") selected @endif value="50000">50000</option>
					<option @if($interview->salary_end=="55000") selected @endif value="55000">55000</option>
					<option @if($interview->salary_end=="60000") selected @endif value="60000">60000</option>
					<option @if($interview->salary_end=="65000") selected @endif value="65000">65000</option>
					<option @if($interview->salary_end=="70000") selected @endif value="70000">70000</option>
					<option @if($interview->salary_end=="75000") selected @endif value="75000">75000</option>
					<option @if($interview->salary_end=="80000") selected @endif value="80000">80000</option>
					<option @if($interview->salary_end=="85000") selected @endif value="85000">85000</option>
					<option @if($interview->salary_end=="90000") selected @endif value="90000">90000</option>
					
					<option @if($interview->salary_end=="100000") selected @endif value="100000">100000</option>
					<option @if($interview->salary_end=="150000") selected @endif value="150000">150000</option>
					<option @if($interview->salary_end=="200000") selected @endif value="200000">200000</option>
					<option @if($interview->salary_end=="250000") selected @endif value="250000">250000</option>
					<option @if($interview->salary_end=="300000") selected @endif value="300000">300000</option>
					<option @if($interview->salary_end=="350000") selected @endif value="350000">350000</option>
					<option @if($interview->salary_end=="400000") selected @endif value="400000">400000</option>
					<option @if($interview->salary_end=="450000") selected @endif value="450000">450000</option>
					<option @if($interview->salary_end=="500000") selected @endif value="500000">500000</option>
					<option @if($interview->salary_end=="550000") selected @endif value="550000">550000</option>
					<option @if($interview->salary_end=="600000") selected @endif value="600000">600000</option>
					<option @if($interview->salary_end=="650000") selected @endif value="650000">650000</option>
					<option @if($interview->salary_end=="700000") selected @endif value="700000">700000</option>
					<option @if($interview->salary_end=="750000") selected @endif value="750000">750000</option>
					<option @if($interview->salary_end=="800000") selected @endif value="800000">800000</option>
					<option @if($interview->salary_end=="850000") selected @endif value="850000">850000</option>
					<option @if($interview->salary_end=="900000") selected @endif value="900000">900000</option>
					<option @if($interview->salary_end=="950000") selected @endif value="950000">950000</option>
					<option @if($interview->salary_end=="1000000") selected @endif value="1000000">1000000</option>
					<option @if($interview->salary_end=="1100000") selected @endif value="1100000">1100000</option>
					<option @if($interview->salary_end=="1200000") selected @endif value="1200000">1200000</option>
					<option @if($interview->salary_end=="1300000") selected @endif value="1300000">1300000</option>
					<option @if($interview->salary_end=="1400000") selected @endif value="1400000">1400000</option>
					<option @if($interview->salary_end=="1500000") selected @endif value="1500000">1500000</option>
							</select>                                   
                                                       
                           </div>
						   
						<div class=" col-md-2">
                          <select name="salary_type" class="form-control">
                            <option value="">--SELECT--</option>
							<option @if($interview->salary_type == "Monthly") selected @endif value="Monthly">Monthly</option>
							<option @if($interview->salary_type == "Annual") selected @endif value="Annual">Annual</option>
                          </select>
                       </div>  
						
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Interview Start Date</label>
                           <div class=" col-md-3">
                              <div class="input-group date addon-datepicker" >
                                 <input class="form-control" id="cname" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $interview->interview_start_date)->format('m/d/Y') }}" name="interview_start_date" type="text" >
                                 <span class="input-group-addon">
                                 <i class="glyphicon glyphicon-th"></i>
                                 </span>
                              </div>
                           </div>
                           <label class="col-md-1 control-label" for="cname"> End</label>
                           <div class=" col-md-3">
                              <div class="input-group date addon-datepicker" >
                                <input class="form-control" id="cname" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d', $interview->interview_end_date)->format('m/d/Y') }}" name="interview_end_date" type="text" >
                                 <span class="input-group-addon">
                                 <i class="glyphicon glyphicon-th"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Interview Location</label>
                           <div class=" col-md-3">
                              <input class="form-control" value="{{ $interview->location }}" id="cname" name="location" type="text" >
                           </div>
                           <label class="col-md-1 control-label" for="cname">State</label>
                           <div class=" col-md-3">
                              <select name="state" class="form-control select2">
										<option value="" >--SELECT--</option>
										<option @if($interview->state=="Andhra Pradesh") selected @endif value="Andhra Pradesh">Andhra Pradesh</option>
										<option @if($interview->state=="Assam") selected @endif value="Assam">Assam</option>
										<option @if($interview->state=="Arunachal Pradesh") selected @endif value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option @if($interview->state=="Bihar") selected @endif value="Bihar">Bihar</option>
										<option @if($interview->state=="Chhattisgarh") selected @endif value="Chhattisgarh">Chhattisgarh</option>
										<option @if($interview->state=="Goa") selected @endif value="Goa">Goa</option>
										<option @if($interview->state=="Gujarat") selected @endif value="Gujarat">Gujarat</option>
										<option @if($interview->state=="Haryana") selected @endif value="Haryana">Haryana</option>
										<option @if($interview->state=="Himachal Pradesh") selected @endif value="Himachal Pradesh">Himachal Pradesh</option>
										<option @if($interview->state=="Jammu Kashmir") selected @endif value="Jammu Kashmir">Jammu Kashmir</option>
										<option @if($interview->state=="Jharkhand") selected @endif value="Jharkhand">Jharkhand</option>
										<option @if($interview->state=="Karnataka") selected @endif value="Karnataka">Karnataka</option>
										<option @if($interview->state=="Kerala") selected @endif value="Kerala">Kerala</option>
										<option @if($interview->state=="Madhya Pradesh") selected @endif value="Madhya Pradesh">Madhya Pradesh</option>
										<option @if($interview->state=="Maharashtra") selected @endif value="Maharashtra">Maharashtra</option>
										<option @if($interview->state=="Manipur") selected @endif value="Manipur">Manipur</option>
										<option @if($interview->state=="Meghalaya") selected @endif value="Meghalaya">Meghalaya</option>
										<option @if($interview->state=="Mizoram") selected @endif value="Mizoram">Mizoram</option>
										<option @if($interview->state=="Nagaland") selected @endif value="Nagaland">Nagaland</option>
										<option @if($interview->state=="Odisha") selected @endif value="Odisha">Odisha</option>
										<option @if($interview->state=="Punjab") selected @endif value="Punjab">Punjab</option>
										<option @if($interview->state=="Rajasthan") selected @endif value="Rajasthan">Rajasthan</option>
										<option @if($interview->state=="Sikkim") selected @endif value="Sikkim">Sikkim</option>
										<option @if($interview->state=="Tamil Nadu") selected @endif value="Tamil Nadu">Tamil Nadu</option>
										<option @if($interview->state=="Telangana") selected @endif value="Telangana">Telangana</option>
										<option @if($interview->state=="Tripura") selected @endif value="Tripura">Tripura</option>
										<option @if($interview->state=="Uttarakhand") selected @endif value="Uttarakhand">Uttarakhand</option>
										<option @if($interview->state=="Uttar Pradesh") selected @endif value="Uttar Pradesh">Uttar Pradesh</option>
										<option @if($interview->state=="West Bengal") selected @endif value="West Bengal">West Bengal</option>
										<option @if($interview->state=="Andaman") selected @endif value="Andaman">Andaman</option>
										<option @if($interview->state=="Chandigarh") selected @endif value="Chandigarh">Chandigarh</option>
										<option @if($interview->state=="Dadra Nagar Haveli") selected @endif value="Dadra Nagar Haveli">Dadra Nagar Haveli</option>
										<option @if($interview->state=="Daman Diu") selected @endif value="Daman Diu">Daman Diu</option>
										<option @if($interview->state=="Delhi") selected @endif value="Delhi">Delhi</option>
										<option @if($interview->state=="Lakshadweep") selected @endif value="Lakshadweep">Lakshadweep</option>
										<option @if($interview->state=="Puducherry") selected @endif value="Puducherry">Puducherry</option>
										<option @if($interview->state=="Other Locations") selected @endif value="Other Locations">Other Locations</option>
									
								</select>
                           </div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="cname">Visa Sponsorship</label>
							<div class=" col-md-3">
							   <select name="is_visa_sponsored" class="form-control">
								  <option  @if($interview->is_visa_sponsored == 0) selected @endif value="0">No</option>
								  <option  @if($interview->is_visa_sponsored == 1) selected @endif value="1">Yes</option>
							   </select>
							</div>
							<label class="col-md-1 control-label" for="cname">Verified</label>
							<div class=" col-md-3">
							   <select name="is_verified" class="form-control">
								   
								<option  @if($interview->is_verified == 0) selected @endif value="0">No</option>
								<option  @if($interview->is_verified == 1) selected @endif value="1">Yes</option>
							   </select>
							</div>
						 </div>

                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Job Description </label>
                           <div class=" col-md-7">
                              <textarea class="full-editor" value="" id="cname" name="job_description" type="text" >{{ $interview->job_description }}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Walkin Location </label>
                           <div class=" col-md-7">
							  <textarea class="full-editor" value="" id="cname" name="walkin_address" type="text" > {{ $interview->walkin_address }} </textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Contact Details </label>
                           <div class=" col-md-7">
							    <textarea class="full-editor" value="" id="cname" name="contact_details" type="text" > {{ $interview->contact_details }} </textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Enter Other Info </label>
                           <div class=" col-md-7">
                              <textarea class="full-editor" value="" id="cname" name="other_info" type="text" > {{ $interview->other_info }} </textarea>
                           </div>
                        </div> 
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Source</label>
                           <div class=" col-md-7">
                              <input class="form-control" value="{{ $interview->source }}" id="cname" name="source" type="text" >
                           </div>
                        </div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="cname">Is Active</label>
							<div class="col-md-7">
								<select name="is_active" class="form-control">
								<option value="" >--SELECT--</option>
									<option @if($interview->is_active == 1) selected @endif value="1">TRUE</option>
									<option @if($interview->is_active == 0) selected @endif value="0">FALSE</option>
								</select>
							</div>
						</div>
	
                        <div class="form-group">
                           <label class="col-md-3 control-label"></label>
                           <div class="col-md-7">
                              <input class="btn btn-success" type="submit" value="Submit">
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