@include('admin.header')
	
		<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-md-7">
							<div class="page-breadcrumb-wrap">
								<div class="page-breadcrumb-info">
									<h2 class="breadcrumb-titles">Manage Company <small>Edit Company</small></h2>
								
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
								<h4>Edit Company</h4>
							</div>
					
							<div class="widget-container">
								<div class=" widget-block">
									
									<form class=" form-horizontal" action="{{URL::to('company/update',$company->id)}}" method="POST" enctype="multipart/form-data">
								
										<div class="form-group">
											<label class="col-md-3 control-label" for="company_name1">Enter Comapny name</label>
											<div class=" col-md-7">
												<input class="form-control" id="" required name="name" value="{{ $company->name }}" type="text" >
												
											</div>
										</div>
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Choose Logo image</label>
											<div class="col-lg-7">
												<input  type="file" class="form-control" name="logo"/>
												<span class="help-block">Choose a image file size 780pxX286px.</span>
											</div>
										</div>
										<div class="form-group">
										<label class="col-md-3 control-label" for="cname"></label>
											<div class="col-lg-7">
												<img width="30%" src="{{$company->logo}}"  />
											</div>
										</div>
										<!--<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Choose Banner image</label>
											<div class="col-lg-7">
												<input   type="file" class="form-control" name="banner"/>
												<span class="help-block">Choose a image file size 780pxX286px.</span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="cname"></label>
											<div class="col-lg-7">
												<img width="30%" src="{{$company->banner}}"  />
											</div>
										</div> -->
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="cname">About Company </label>
											<div class=" col-md-7">
												<textarea class="full-editor" value="{{ $company->about_company }}" id="about_company" name="about_company" type="text" >{{ $company->about_company }}</textarea>
											
											</div>
												</div>	 

											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Select Company Type</label>
											<div class="col-md-7">
												<select name="type" class="form-control">
													<option value="" >--SELECT--</option>
													<option @if($company->type=="company") selected @endif value="company">Company</option>
													<option @if($company->type=="consultancy") selected @endif value="consultancy">Consultancy</option>
													
												</select>
											</div>
											</div>
											
											<div class="form-group">
													<label class="col-md-3 control-label" for="cname">Select Industry Type</label>
														<div class="col-md-7">
															<select required name="industry_id" class="form-control select2">
															@php
															$industry = App\Model\Industry::where('is_active',1)->get();
															@endphp
															<option value="" >--SELECT--</option>
															@foreach($industry as $value)
															<option @if($value->id == $company->industry_id) selected @endif  value="{{ $value->id }}">{{ $value->name }}</option>@endforeach												
															</select>
														</div>
											</div>

											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter City</label>
											<div class=" col-md-7">
												<input class="form-control" value="{{ $company->city }}" id="city" name="city" type="text" >
													</div>	
											</div>
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Select State</label>
											<div class="col-md-7">
												<select name="state" class="form-control select2">
													<option value="" >--SELECT--</option>
													<option @if($company->state=="Andhra Pradesh") selected @endif value="Andhra Pradesh">Andhra Pradesh</option>
													<option @if($company->state=="Assam") selected @endif value="Assam">Assam</option>
													<option @if($company->state=="Arunachal Pradesh") selected @endif value="Arunachal Pradesh">Arunachal Pradesh</option>
													<option @if($company->state=="Bihar") selected @endif value="Bihar">Bihar</option>
													<option @if($company->state=="Chhattisgarh") selected @endif value="Chhattisgarh">Chhattisgarh</option>
													<option @if($company->state=="Goa") selected @endif value="Goa">Goa</option>
													<option @if($company->state=="Gujarat") selected @endif value="Gujarat">Gujarat</option>
													<option @if($company->state=="Haryana") selected @endif value="Haryana">Haryana</option>
													<option @if($company->state=="Himachal Pradesh") selected @endif value="Himachal Pradesh">Himachal Pradesh</option>
													<option @if($company->state=="Jammu Kashmir") selected @endif value="Jammu Kashmir">Jammu Kashmir</option>
													<option @if($company->state=="Jharkhand") selected @endif value="Jharkhand">Jharkhand</option>
													<option @if($company->state=="Karnataka") selected @endif value="Karnataka">Karnataka</option>
													<option @if($company->state=="Kerala") selected @endif value="Kerala">Kerala</option>
													<option @if($company->state=="Madhya Pradesh") selected @endif value="Madhya Pradesh">Madhya Pradesh</option>
													<option @if($company->state=="Maharashtra") selected @endif value="Maharashtra">Maharashtra</option>
													<option @if($company->state=="Manipur") selected @endif value="Manipur">Manipur</option>
													<option @if($company->state=="Meghalaya") selected @endif value="Meghalaya">Meghalaya</option>
													<option @if($company->state=="Mizoram") selected @endif value="Mizoram">Mizoram</option>
													<option @if($company->state=="Nagaland") selected @endif value="Nagaland">Nagaland</option>
													<option @if($company->state=="Odisha") selected @endif value="Odisha">Odisha</option>
													<option @if($company->state=="Punjab") selected @endif value="Punjab">Punjab</option>
													<option @if($company->state=="Rajasthan") selected @endif value="Rajasthan">Rajasthan</option>
													<option @if($company->state=="Sikkim") selected @endif value="Sikkim">Sikkim</option>
													<option @if($company->state=="Tamil Nadu") selected @endif value="Tamil Nadu">Tamil Nadu</option>
													<option @if($company->state=="Telangana") selected @endif value="Telangana">Telangana</option>
													<option @if($company->state=="Tripura") selected @endif value="Tripura">Tripura</option>
													<option @if($company->state=="Uttarakhand") selected @endif value="Uttarakhand">Uttarakhand</option>
													<option @if($company->state=="Uttar Pradesh") selected @endif value="Uttar Pradesh">Uttar Pradesh</option>
													<option @if($company->state=="West Bengal") selected @endif value="West Bengal">West Bengal</option>
													<option @if($company->state=="Andaman") selected @endif value="Andaman">Andaman</option>
													<option @if($company->state=="Chandigarh") selected @endif value="Chandigarh">Chandigarh</option>
													<option @if($company->state=="Dadra Nagar Haveli") selected @endif value="Dadra Nagar Haveli">Dadra Nagar Haveli</option>
													<option @if($company->state=="Daman Diu") selected @endif value="Daman Diu">Daman Diu</option>
													<option @if($company->state=="Delhi") selected @endif value="Delhi">Delhi</option>
													<option @if($company->state=="Lakshadweep") selected @endif value="Lakshadweep">Lakshadweep</option>
													<option @if($company->state=="Puducherry") selected @endif value="Puducherry">Puducherry</option>
													<option @if($company->state=="All Locations") selected @endif value="All Locations">All Locations</option>
												
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Address </label>
											<div class=" col-md-7">
												<textarea class="full-editor" value="{{ $company->address }}" id="address" name="address" type="text" >{{ $company->about_company }}</textarea>
											
											</div>
												</div>
											
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Pincode</label>
											<div class=" col-md-7">
												<input class="form-control" value="{{ $company->pincode }}" id="pincode" name="pincode" type="text" >
													</div>	
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Email</label>
											<div class=" col-md-7">
												<input class="form-control" value="{{ $company->email }}" id="email" name="email" type="text" >
													</div>	
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Website URL</label>
											<div class=" col-md-7">
												<input class="form-control" value="{{ $company->website }}" id="website" name="website" type="text" >
													</div>	
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Phone Number</label>
											<div class=" col-md-7">
												<input class="form-control" value="{{ $company->phone }}" id="phone" name="phone" type="text" >
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