<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Student extends Model {
	use SoftDeletes;
  protected $dates = ['created_at','dob'];
	protected $table = 'students';
  protected $fillable = [
		'idNo',
  'session',
  'department_id',
  'bncReg',
  	'firstName',
  	'middleName',
  	'lastName',
  	'mobileNo',
  	'gender',
  	'religion',
  	'bloodgroup',
  	'nationality',
  	'dob',
  	'photo',
  	'fatherName',
  	'fatherMobileNo',
  	'motherName',
  	'motherMobileNo',
  	'localGuardian',
  	'localGuardianMobileNo',
     'presentAddress',
     'parmanentAddress',
     'isActive'
  	];
		function setDobAttribute($value)
		{
		   $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $value);
		}
  public function department() {
   return $this->belongsTo('App\Department');
 }
  public function registered() {
   return $this->hasMany('App\Registration','students_id');
 }
  public function attendance() {
   return $this->hasMany('App\Attendance','students_id');
 }

}