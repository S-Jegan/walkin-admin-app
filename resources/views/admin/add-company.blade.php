@include('admin.header')
	
		<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-md-7">
							<div class="page-breadcrumb-wrap">
								<div class="page-breadcrumb-info">
									<h2 class="breadcrumb-titles">Manage Company <small>Add Company</small></h2>
								
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
								<h4>Add Company</h4>
							</div>
					
							<div class="widget-container">
								<div class=" widget-block">
									
									<form class=" form-horizontal" action="{{URL::to('add-company')}}" method="POST" enctype="multipart/form-data">
								
										<div class="form-group">
											<label class="col-md-3 control-label" for="company_name1">Enter Comapny name</label>
											<div class=" col-md-7">
												<input class="form-control" id="" required value="{{ old('name') }}" name="name" type="text" >
												
											</div>
										</div>
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Choose Logo image</label>
											<div class="col-lg-7">
												<input required type="file" class="form-control" name="logo"/>
												<span class="help-block">Choose a image file size 780pxX286px.</span>
											</div>
										</div>
										<!--<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Choose Banner image</label>
											<div class="col-lg-7">
												<input required  type="file" class="form-control" name="banner"/>
												<span class="help-block">Choose a image file size 780pxX286px.</span>
											</div>
										</div> -->
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="cname">About Company </label>
											<div class=" col-md-7">
												<textarea class="full-editor" value="{{ old('about_company') }}" id="about_company" name="about_company" type="text" ></textarea>
											
											</div>
												</div>	 

											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Select Company Type</label>
											<div class="col-md-7">
												<select name="company_type" class="form-control">
													<option value="" >--SELECT--</option>
													<option value="{{ old('company_type') }}">Company</option>
													<option value="{{ old('company_type') }}">Consultancy</option>
												
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
														<option value="{{ $value->id }}">{{ $value->name }}</option>@endforeach												
														</select>
													</div>
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter City</label>
											<div class=" col-md-7">
												<input class="form-control"value="{{ old('city') }}" id="city" name="city" type="text" >
													</div>	
											</div>
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Select State</label>
											<div class="col-md-7">
												<select name="state" class="form-control select2">
													<option value="" >--SELECT--</option>
													<option value="Andhra Pradesh">Andhra Pradesh</option>
													<option value="Arunachal Pradesh">Arunachal Pradesh</option>
													<option value="Assam">Assam</option>
													<option value="Bihar">Bihar</option>
													<option value="Chhattisgarh">Chhattisgarh</option>
													<option value="Goa">Goa</option>
													<option value="Gujarat">Gujarat</option>
													<option value="Haryana">Haryana</option>
													<option value="Himachal Pradesh">Himachal Pradesh</option>
													<option value="Jammu Kashmir">Jammu Kashmir</option>
													<option value="Jharkhand">Jharkhand</option>
													<option value="Karnataka">Karnataka</option>
													<option value="Kerala">Kerala</option>
													<option value="Madhya Pradesh">Madhya Pradesh</option>
													<option value="Maharashtra">Maharashtra</option>
													<option value="Manipur">Manipur</option>
													<option value="Meghalaya">Meghalaya</option>
													<option value="Mizoram">Mizoram</option>
													<option value="Nagaland">Nagaland</option>
													<option value="Odisha">Odisha</option>
													<option value="Punjab">Punjab</option>
													<option value="Rajasthan">Rajasthan</option>
													<option value="Sikkim">Sikkim</option>
													<option value="Tamil Nadu">Tamil Nadu</option>
													<option value="Telangana">Telangana</option>
													<option value="Tripura">Tripura</option>
													<option value="Uttarakhand">Uttarakhand</option>
													<option value="Uttar Pradesh">Uttar Pradesh</option>
													<option value="West Bengal">West Bengal</option>
													<option value="Andaman">Andaman</option>
													<option value="Chandigarh">Chandigarh</option>
													<option value="Dadra Nagar Haveli">Dadra Nagar Haveli</option>
													<option value="Daman Diu">Daman Diu</option>
													<option value="Delhi">Delhi</option>
													<option value="Lakshadweep">Lakshadweep</option>
													<option value="Puducherry">Puducherry</option>
													<option value="All Locations">All Locations</option>
												
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Address </label>
											<div class=" col-md-7">
												<textarea class="full-editor" value="{{ old('address') }}" id="address" name="address" type="text" ></textarea>
											
											</div>
												</div>
											
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Pincode</label>
											<div class=" col-md-7">
												<input class="form-control"value="{{ old('pincode') }}" id="pincode" name="pincode" type="text" >
													</div>	
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Email</label>
											<div class=" col-md-7">
												<input class="form-control"value="{{ old('email') }}" id="email" name="email" type="text" >
													</div>	
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Website URL</label>
											<div class=" col-md-7">
												<input class="form-control"value="{{ old('website') }}" id="website" name="website" type="text" >
													</div>	
											</div>
											
											<div class="form-group">
											<label class="col-md-3 control-label" for="cname">Enter Phone Number</label>
											<div class=" col-md-7">
												<input class="form-control"value="{{ old('phone') }}" id="phone" name="phone" type="text" >
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