<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Employee extends Model
{
    protected $primaryKey='empID';

    public static function getAllRecords(){
        return User::where('role','employee')->get();
    }

    public static function addEmployeeRecord($value){
        User::create($value);
    }

    public static function deleteEmployee($id){
       User::where('id',$id)->delete();
    }
    public static function getEmployee($id){

        return User::where('id',$id)->first();
    }

    public static function updateEmplpoyee($employee,$value){
        $employee->update($value);
    }
    public static function getMaxID(){
        return DB::table('users')->max('empID');
    }
}
