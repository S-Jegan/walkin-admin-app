@include('admin.header')
<div class="main-container">
    <div class="container-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-breadcrumb-wrap">
                        <div class="page-breadcrumb-info">
                            <h2 class="breadcrumb-titles">Manage WalkIn <small>Add WalkIn</small></h2>
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
                        <h4>Add WalkIn</h4>
                    </div>
                    <div class="widget-container">
                        <div class=" widget-block">
                            <form class=" form-horizontal" action="{{URL::to('interview')}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="company_name1">Comapany name</label>
                                    <div class=" col-md-7">
                                        <select name="company_id" id="company_id" class="form-control select2" data-role="select-dropdown" >
                                            @php $company = App\Model\Company::where('is_active',1)->get(); @endphp
                                            <option value="">--SELECT--</option>
                                            @foreach($company as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--<div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Notification Image</label>
                                    <div class="col-lg-7">
                                        <input required type="file" class="form-control" name="fcm_url" />
                                        <span class="help-block">Choose a image file size 780pxX286px.</span>
                                    </div>
                                </div> -->
                                <!--
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Industry</label>
                                    <div class=" col-md-7">
                                        <select name="industry_id" id="industry_id" class="form-control" data-role="select-dropdown">
                                            @php $industry = App\Model\Industry::where('is_active',1)->get(); @endphp
                                            <option value="">--SELECT--</option>
                                            @foreach($industry as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->

                                <!--Category List -->

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Job Category</label>
                                    <div class=" col-md-7">
                                        <select name="category_id" id="category_id" class="form-control select2" data-role="select-dropdown">
                                            @php $categories = App\Model\Category::where('is_active',1)->get(); @endphp
                                            <option value="">--SELECT--</option>
                                            @foreach($categories as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Designation</label>
                                    <div class=" col-md-7">
                                        <input class="form-control" value="{{ old('designation') }}" id="cname" name="designation" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Skills</label>
                                    <div class=" col-md-7">
                                        <input class="form-control" value="{{ old('skills') }}" id="cname" name="skills" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Qualification</label>
                                    <div class=" col-md-3">
                                        <input class="form-control" value="{{ old('qualification') }}" id="cname" name="qualification" type="text">
                                    </div>
                                    <label class="col-md-1 control-label" for="cname">Type</label>
                                    <div class=" col-md-3">
                                        <select name="work_mode" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Freelance">Freelance</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Interview Attendees</label>
                                    <div class=" col-md-3">
                                        <select name="audience" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <option value="Freshers">Freshers</option>
                                            <option value="Experienced">Experienced</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                    <label class="col-md-1 control-label" for="cname">Vacancies</label>
                                    <div class=" col-md-3">
                                        <select name="vacancies" class="form-control">
                                            <option value="">Not Disclosed</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Experience Start</label>
                                    <div class=" col-md-3">
                                        <select name="exp_start" class="form-control select2">
                                            <option value="">--SELECT--</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    <label class="col-md-1 control-label" for="cname"> End</label>
                                    <div class=" col-md-3">
                                        <select name="exp_end" class="form-control select2">
                                            <option value="">--SELECT--</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Salary Start</label>
                                    <div class=" col-md-3">
                                        <select name="salary_start" class="form-control select2">
                                            <option value="">Not Disclosed</option>
                                             <option value="5000">5000</option>
                                            <option value="10000">10000</option>
                                            <option value="15000">15000</option>
                                            <option value="20000">20000</option>
                                            <option value="25000">25000</option>
                                            <option value="30000">30000</option>
                                            <option value="35000">35000</option>
                                            <option value="40000">40000</option>
                                            <option value="45000">45000</option>
                                            <option value="50000">50000</option>
                                            <option value="60000">60000</option>
                                            <option value="70000">70000</option>
                                            <option value="80000">80000</option>
                                            <option value="90000">90000</option>
                                            <option value="100000">100000</option>
                                            <option value="150000">150000</option>
                                            <option value="200000">200000</option>
                                            <option value="250000">250000</option>
                                            <option value="300000">300000</option>
                                            <option value="350000">350000</option>
                                            <option value="400000">400000</option>
                                            <option value="450000">450000</option>
                                            <option value="500000">500000</option>
                                            <option value="550000">550000</option>
                                            <option value="600000">600000</option>
                                            <option value="650000">650000</option>
                                            <option value="700000">700000</option>
                                            <option value="750000">750000</option>
                                            <option value="800000">800000</option>
                                            <option value="850000">850000</option>
                                            <option value="900000">900000</option>
                                            <option value="950000">950000</option>
                                            <option value="1000000">1000000</option>
                                        </select>
                                    </div>
                                    <label class="col-md-1 control-label" for="cname"> End</label>
                                    <div class=" col-md-3">
                                        <select name="salary_end" class="form-control select2">
                                            <option value="">Not Disclosed</option>
                                             <option value="5000">5000</option>
                                            <option value="10000">10000</option>
                                            <option value="15000">15000</option>
                                            <option value="20000">20000</option>
                                            <option value="25000">25000</option>
                                            <option value="30000">30000</option>
                                            <option value="35000">35000</option>
                                            <option value="40000">40000</option>
                                            <option value="45000">45000</option>
                                            <option value="50000">50000</option>
                                            <option value="60000">60000</option>
                                            <option value="70000">70000</option>
                                            <option value="80000">80000</option>
                                            <option value="90000">90000</option>
                                            <option value="100000">100000</option>
                                            <option value="150000">150000</option>
                                            <option value="200000">200000</option>
                                            <option value="250000">250000</option>
                                            <option value="300000">300000</option>
                                            <option value="350000">350000</option>
                                            <option value="400000">400000</option>
                                            <option value="450000">450000</option>
                                            <option value="500000">500000</option>
                                            <option value="550000">550000</option>
                                            <option value="600000">600000</option>
                                            <option value="650000">650000</option>
                                            <option value="700000">700000</option>
                                            <option value="750000">750000</option>
                                            <option value="800000">800000</option>
                                            <option value="850000">850000</option>
                                            <option value="900000">900000</option>
                                            <option value="950000">950000</option>
                                            <option value="1000000">1000000</option>
                                            <option value="1100000">1100000</option>
                                            <option value="1200000">1200000</option>
                                            <option value="1300000">1300000</option>
                                            <option value="1400000">1400000</option>
                                            <option value="1500000">1500000</option>
                                        </select>
                                    </div>
									
									<div class=" col-md-2">
                                        <select name="salary_type" class="form-control">
                                            <option value="">--SELECT--</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Annual">Annual</option>
                                        </select>
                                    </div>  
									
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Interview Start Date</label>
                                    <div class=" col-md-3">
                                        <div class="input-group date addon-datepicker">
                                            <input class="form-control" id="cname" value="{{ old('interview_start_date') }}" name="interview_start_date" type="text">
                                            <span class="input-group-addon">
                                 <i class="glyphicon glyphicon-th"></i>
                                 </span>
                                        </div>
                                    </div>
                                    <label class="col-md-1 control-label" for="cname"> End</label>
                                    <div class=" col-md-3">
                                        <div class="input-group date addon-datepicker">
                                            <input class="form-control" id="cname" value="{{ old('interview_end_date') }}" name="interview_end_date" type="text">
                                            <span class="input-group-addon">
                                 <i class="glyphicon glyphicon-th"></i>
                                 </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Interview Location</label>
                                    <div class=" col-md-3">
                                        <input class="form-control" value="{{ old('location') }}" id="cname" name="location" type="text">
                                    </div>
                                    <label class="col-md-1 control-label" for="cname">State</label>
                                    <div class=" col-md-3">
                                        <select name="state" class="form-control select2">
                                            <option value="">--SELECT--</option>
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
                                            <option value="Other Locations">Other Locations</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Visa Sponsorship</label>
                                    <div class=" col-md-3">
                                        <select name="is_visa_sponsored" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <label class="col-md-1 control-label" for="cname">Verified</label>
                                    <div class=" col-md-3">
                                        <select name="is_verified" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Enter Job Description </label>
                                    <div class=" col-md-7">
                                        <textarea class="full-editor" value="{{ old('job_description') }}" id="job_description" name="job_description" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Enter Walkin Location </label>
                                    <div class=" col-md-7">
                                        <textarea class="full-editor" value="{{ old('walkin_address') }}" id="cname" name="walkin_address" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Enter Contact Details </label>
                                    <div class=" col-md-7">
                                        <textarea class="full-editor" value="{{ old('contact_details') }}" id="cname" name="contact_details" type="text"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Enter Other Info </label>
                                    <div class=" col-md-7">
                                        <textarea class="full-editor" id="cname" name="other_info" type="text">{{ old('other_info') }} </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="cname">Source</label>
                                    <div class=" col-md-7">
                                        <input class="form-control" value="{{ old('source') }}" id="cname" name="source" type="text">
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

<script type="text/javascript">
    $(document).ready(function() {
        /* Populate data to state dropdown */
        $('#company').on('change', function() {
            var companyID = $(this).val();
            if (companyID) {
                $.ajax({
                    type: 'POST',
                    url: '/getCompany',
                    data: 'company_id=' + companyID,
                    success: function(data) {
                        $('#industry').html('<option value="">Select Industry</option>');
                        var dataObj = jQuery.parseJSON(data);
                        if (dataObj) {
                            $(dataObj).each(function() {
                                var option = $('<option />');
                                option.attr('value', this.id).text(this.name);
                                $('#industry').append(option);
                            });
                        } else {
                            $('#industry').html('<option value="">industry not available</option>');
                        }
                    }
                });
            } else {
                $('#industry').html('<option value="">Select Company first</option>');
                $('#department').html('<option value="">Select industry first</option>');
            }
        });

        /* Populate data to department dropdown */
        $('#industry').on('change', function() {
            var departmentID = $(this).val();
            if (departmentID) {
                $.ajax({
                    type: 'POST',
                    url: '',
                    data: 'department_id=' + departmentID,
                    success: function(data) {
                        $('#department').html('<option value="">Select Department</option>');
                        var dataObj = jQuery.parseJSON(data);
                        if (dataObj) {
                            $(dataObj).each(function() {
                                var option = $('<option />');
                                option.attr('value', this.id).text(this.name);
                                $('#department').append(option);
                            });
                        } else {
                            $('#department').html('<option value="">Department not available</option>');
                        }
                    }
                });
            } else {
                $('#department').html('<option value="">Select Insustry first</option>');
            }
        });
    });
</script>
<!--Footer Start Here -->
@include('admin.footerck')