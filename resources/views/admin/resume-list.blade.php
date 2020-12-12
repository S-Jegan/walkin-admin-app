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
								<h4>Resume List</h4>
							</div>
							<div class="widget-container">
								<div class=" widget-block">
									<table class="table dt-table">
									<thead>
									<tr>
										
										<th>
											Name
										</th>
										
										<th>
											Designation
										</th>
										
										<th>
											Category											
										</th>
										<th>
											Word Format											
										</th>
										<th>
											PDF Format
										</th>
										
										<th>
											Action
										</th>
									</tr>
									</thead>
									
                                    <tbody>
									
									@foreach($resume as $value)
                                    <tr>
                                         <td>
                                        {{$value->name}}
                                        </td>
                                        <td>
                                        {{$value->designation}}
                                        </td>
                                        <td>
                                        {{ App\Model\Category::find($value->category_id)->name }}
                                        </td>
										<td>
                                        <a target="#" href="{{$value->word_url}}"> Word Link </a>
                                        </td>
                                        <td>
                                         <a target="_blank" href="{{$value->pdf_url}}"> PDF Link </a>
                                        </td>
										 
                                        <td>
										@if(\Auth::user()->user_type=="admin")
                                        <a  href="{{ url::to('resume/edit',$value->id) }}" class="label label-info">Edit</a>
										<a  href="{{ url::to('resume/destroy',$value->id) }}" class="label label-danger">Delete</a>
										@else 
										Read Only
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