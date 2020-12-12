@include('admin.header')
	
		<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-md-7">
							<div class="page-breadcrumb-wrap">
								<div class="page-breadcrumb-info">
									<h2 class="breadcrumb-titles">Settings <small>Profile</small></h2>
								
								</div>
							</div>
						</div>
						<div class="col-md-5">
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
					<div class="col-md-6">
						<div class="box-widget widget-module">
							<div class="widget-head clearfix">
								<span class="h-icon"><i class="fa fa-bars"></i></span>
								<h4>Admin Profile</h4>
							</div>
					
							<div class="widget-container">
								<div class=" widget-block">
									
									<form class="cmxform form-horizontal">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group">
											<label class="col-md-4 control-label" for="cname">Name : </label>
												<label class="control-label">{{Auth::user()->name}} </label>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="cname">Status : </label>
												<label class="control-label">active </label>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="cname">Email Address : </label>
												<label class="control-label">{{Auth::user()->email}} </label>
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
   @include('admin.footer')