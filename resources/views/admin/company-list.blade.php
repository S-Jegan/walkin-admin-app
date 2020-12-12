@include('admin.header')
		<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					
				</div>
				<div class="row">
					<div class="col-md-12">
					@if(Session::has('success')||Session::has('fail'))
				  <div class="alert @if(Session::has('success')) alert-success @else alert-danger @endif " role="alert">
				   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				 @if(Session::has('success')){{ Session::get('success') }} @else {{ Session::get('fail') }} @endif
					</div>
					@endif
						<div class="box-widget widget-module">
							<div class="widget-head clearfix">
								<span class="h-icon"><i class="fa fa-th"></i></span>
								<h4>Company List</h4>
							</div>
							<div class="widget-container">
								<div class=" widget-block">
									<table class="table dt-table">
									<thead>
									<tr>
										
										<th>
											Company Name
										</th>
										
										<th>
											Company Type											
										</th>
										<th>
											City											
										</th>
										<th>
											State
										</th>
										
										<th>
											Email
										</th>
										
										<th>
											Phone Number
										</th>
										<th>
											Action
										</th>
									</tr>
									</thead>
									
                                    <tbody>
									
									@foreach($companies as $company)
                                    <tr>
                                         <td>
                                        {{$company->name}}
                                        </td>
                                        <td>
                                        {{$company->type}}
                                        </td>
                                        <td>
                                        {{$company->city}}
                                        </td>
										<td>
                                        {{$company->state}}
                                        </td>
                                        <td>
                                        {{$company->email}}
                                        </td>
										 <td>
                                        {{$company->phone}}
                                        </td>
										 
                                        <td>
										<a href="{{ url::to('company/view',$company->id) }}" class="label label-primary">View</a>
										@if(\Auth::user()->user_type=="admin" || \Auth::user()->id == $company->created_by )
                                        <a href="{{ url::to('company/edit',$company->id) }}" class="label label-info">Edit</a>
										<a href="{{ url::to('company-deactive',$company->id) }}" class="label label-danger">Delete</a>
										@endif
                                        </td>
                                       
                                    </tr>
									@endforeach
                                   
                                    </tbody>
									</table>
								</div>
							</div>
						</div>
						
					
					</div>
				
				</div>
			
			</div>
		</div>
   @include('admin.footer')