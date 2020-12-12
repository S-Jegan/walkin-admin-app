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
								<h4>Interview List</h4>
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
											Designation
										</th>
										<th>
											Qualification
										</th>
										<th>
											Category
										</th>
										<th>
										Interview Date											
										</th>
										 
										 @if(\Auth::user()->user_type=="admin")
										<th>
											Created By
										</th>
										@endif
										<th>
											Option
										</th>
										
									</tr>
									</thead>
									
                                    <tbody>
									
									@foreach($interviews as $interview)
                                    <tr>
                                         <td>
										{{ App\Model\Company::find($interview->company_id)->name}}

                                        </td>
                                        <td>
                                        {{$interview->designation}}
                                        </td>
                                        <td>
                                        {{$interview->qualification}}
                                        </td>
										<td>
										{{ App\Model\Category::find($interview->category_id)->name}}
                                         </td>
                                        <td>
                                        {{$interview->interview_start_date}}
                                        </td>
										  @if(\Auth::user()->user_type=="admin")
										  <td>
                                        {{$interview->created_by}}
                                        </td>
										@endif
										<td>
										<a href="{{ url::to('interview/view',$interview->id) }}" class="label label-primary">View</a>
                                        @if(\Auth::user()->user_type=="admin" || \Auth::user()->id == $interview->created_by )
                                        <a href="{{ url::to('interview/edit',$interview->id) }}" class="label label-info">Edit</a>
										<a href="{{ url::to('interview/destroy',$interview->id) }}" class="label label-danger">Delete</a>
										<a href="{{ url::to('fcm',$interview->id) }}" class="label @if($interview->fcm_indicator==0)label-success @else label-danger @endif" >FCM</a>
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