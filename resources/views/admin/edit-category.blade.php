@include('admin.header')
	
		<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-md-7">
							<div class="page-breadcrumb-wrap">
								<div class="page-breadcrumb-info">
									<h2 class="breadcrumb-titles">Manage Category</h2>
								
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
								<h4>Edit Category</h4>
							</div>
					
							<div class="widget-container">
								<div class=" widget-block">
									
										<form class=" form-horizontal" action="{{URL::to('category/update',$category->id)}}" method="POST" enctype="multipart/form-data">
								
										<div class="form-group">
											<label class="col-md-3 control-label" for="category_name">Enter Category Name</label>
											<div class=" col-md-7">
												<input class="form-control" id="" required value="{{ $category->name }}" name="name" type="text" >

											</div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label class="col-md-3 control-label" for="cname">Choose Banner image</label>
                                                <div class="col-lg-7">
                                                    <input required  type="file" class="form-control" name="img_url"/>
                                                    <span class="help-block">Choose a image file size 512px X 512px.</span>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label class="col-md-3 control-label" for="cname"></label>
                                                <div class="col-lg-7">
                                                        <img width="15%" src="{{$category->img_url}}"   />
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