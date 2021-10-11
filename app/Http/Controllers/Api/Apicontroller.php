<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class Apicontroller extends Controller
{
    //create API  --post
    public function createEmployee(Request $request){
        //validation
       $request->validate([
           "name"=>"required",
           "email"=>"required|email|unique:employees",
           "phone_no"=>"required",
           "gender",
           "age"
       ]);
       //create Data
       $employee = new Employee();
       $employee->name = $request->name;
       $employee->email = $request->email;
       $employee->phone_no = $request->phone_no;
       $employee->gender = $request->gender;
       $employee->age = $request->age;

       $employee->save();

       //send response
        return response()->json([
            "status"=>1,
            "message"=>"Data Successfully send"

        ]);

    }
    //List API  --get
    public function listEmployees(){

    }
    //Single Detail API   --get
    public function getSingleEmployee($id){


    }
    //Update Employee  --put
    public function udateEmployee(Request $request,$id){

    }
    //delete API   --delete
    public function deleteEmployee($id){

    }
}
