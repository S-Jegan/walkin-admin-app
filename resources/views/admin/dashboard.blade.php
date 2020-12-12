@include('admin.header')
<div class="main-container">
<div class="container-fluid">
<div class="page-breadcrumb">
    <div class="row"> 
        <div class="col-md-7">
            <div class="page-breadcrumb-wrap">

                <div class="page-breadcrumb-info">
                    <h2 class="breadcrumb-titles">Dashboard <small>WalkIn App</small></h2>
                    <ul class="list-page-breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active-page"> WalkIn App</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>
</div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap number-rotate">
                <span class="stat-w-title">Today WalkIns</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-delicious"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="330" data-animation-duration="1500">{{$today_walkins}}</span>
                    <span class="w-meta-title">WalkIns</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Active WalkIns</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-slack"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="127" data-animation-duration="1500">{{$active_walkins}}</span>
                    <span class="w-meta-title">WalkIns</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Posted Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-plus-square"></i></span>
                </a>
                <div class="w-meta-info ">
                    <span class="w-meta-value number-animate" data-value="6127" data-animation-duration="1500">{{$posted_today}}</span>
                    <span class="w-meta-title">New Posts</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Total Views</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-slideshare"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="20000" data-animation-duration="1500">{{$total_views}}</span>
                    <span class="w-meta-title">Jobs Viewed</span>
                </div>
            </div>
        </div>

		 
    </div>
 
    </div>
</div>
</div>
</div>
@include('admin.footer')