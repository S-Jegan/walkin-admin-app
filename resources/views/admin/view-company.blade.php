@include('admin.header')
<div class="main-container">
   <div class="container-fluid">
      <div class="page-breadcrumb">
         <div class="row">
            <div class="col-md-7">
               <div class="page-breadcrumb-wrap">
                  <div class="page-breadcrumb-info">
                     <h2 class="breadcrumb-titles">Manage Company</h2>
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
                  <h4>View Company</h4>
               </div>
               <div class="widget-container">
                  <div class=" widget-block">
                     <form class=" form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="company_name1">Comapny name</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control" id="" required value="{{ $company->name }}" name="name" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Logo image</label>
                           <div class="col-lg-7">
                               <img width="50%" src="{{$company->logo}}"  />
                           </div>
                        </div>
                        <!--<div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Banner image</label>
                           <div class="col-lg-7">
                               <img width="50%" src="{{$company->banner}}"  />
                           </div>
                        </div> -->
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">About Company </label>
                           <div class=" col-md-7">
                              {!! $company->about_company !!}
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Company Type</label>
                           <div class="col-md-7">
                               <input readonly class="form-control" value="{{ $company->type }}" id="cname" name="source" type="text" >
                               
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Industry Type</label>
                           <div class="col-md-7">
                              @php
                              $industry = App\Model\Industry::where('is_active',1)->where('id',$company->industry_id)->first();
                              @endphp
                              <input readonly class="form-control" value="{{ $industry->name }}" id="cname" name="source" type="text" >
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">City</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control"value="{{ $company->city }}" id="city" name="city" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname"> State</label>
                           <div class="col-md-7">
                               <input readonly class="form-control" value="{{ $company->state }}" id="cname" name="source" type="text" >
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname"> Address </label>
                           <div class=" col-md-7">
                                {!! $company->address !!}                           
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname"> Pincode</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control"value="{{ $company->pincode }}" id="pincode" name="pincode" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Email</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control"value="{{ $company->email }}" id="email" name="email" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Website URL</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control"value="{{ $company->website }}" id="website" name="website" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-3 control-label" for="cname">Phone Number</label>
                           <div class=" col-md-7">
                              <input readonly class="form-control"value="{{ $company->phone }}" id="phone" name="phone" type="text" >
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