<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WalkinInterviewDetails extends Model
{	
 protected $table = 'interviews';
     protected $fillable = [
        'company_id',
        'fcm_url',
        'industry_id',
        'dept_id',
        'category_id',
        'designation',
        'vacancies',
        'qualification',
        'skills',
        'exp_start',
        'exp_end',
        'salary_start',
        'salary_end',
        'audience',
        'work_mode',
        'job_description',
        'interview_start_date',
        'interview_end_date',
        'location',
        'state',
        'walkin_address',
        'contact_details',
        'other_info',
        'no_of_views',
        'no_of_shares',
        'source',
        'is_active',
        'created_by',
        'is_verified',
        'is_visa_sponsored',
        'is_fcm_sent',
		'salary_type',
        'created_at',
        'updated_at'
    ];
	
    protected $casts = [
    'job_verified' => 'boolean',
    ];
     //protected $hidden = array('created_at', 'updated_at');

   /*  public function getLogoUrlAttribute($val){
        return env('APP_URL')."console/public/interview/".$val;
    }*/
     /*public function getFcmUrlAttribute($val){
         return env('APP_URL')."walkin/public/interview/".$val;
    }*/
	public function company(){
		 return $this->hasOne(Company::class,'id', 'company_id');
    } 
	 public function industry(){
		 return $this->hasOne(Industry::class, 'id','industry_id');
    } 
	/* public function department(){
		 return $this->hasOne(Department::class, 'id','dept_id');
    }*/
	
	/* public function getCompanyNameAttribute($val){
		$company = Company::find($this->attributes['company_id'])->first();
         return $company->name;
    }
	public function getCompanyNameAttribute($val){
		$company = Company::find($this->attributes['company_id'])->first();
         return $company->name;
    }	
	public function getCompanyNameAttribute($val){
		$company = Company::find($this->attributes['company_id'])->first();
         return $company->name;
    } */

}
