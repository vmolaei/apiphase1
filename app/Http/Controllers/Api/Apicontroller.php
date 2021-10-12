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
        $employees = Employee::get();
        return response()->json([
            "status"=>1,
            "message"=>"List emoloyees",
            "data"=>$employees
        ],200);

    }
    //Single Detail API   --get
    public function getSingleEmployee($id){
        if(Employee::where("id",$id)->exists()){
            $employee_detail = Employee::where("id",$id)->first();
            return  response([
                "status"=>1,
                "messahe"=>"Employee found",
                "data"=>$employee_detail
            ]);

        }else{
            return response([
                "status"=>0,
                "message"=>"Employee not found"
            ],404);
        }


    }
    //Update Employee  --put
    public function udateEmployee(Request $request,$id){
        if(Employee::where("id",$id)->exists()){
            $employee = Employee::find($id);

            $employee->name = !empty($request->name)?$request->name : $employee->name;
            $employee->email = !empty($request->email)?$request->email : $employee->email;
            $employee->phone_no = !empty($request->phone_no)? $request->phone_no : $employee->phone_no;
            $employee->gender = !empty($request->gender)? $request->gender : $employee->gender;
            $employee->age = !empty($request->age)?$request->age : $employee->age;

            $employee->save();

            return response([
                "status"=>1,
                "message"=>"Employee updated successfully"

            ]);


        }else{
            return response([
                "status"=>0,
                "message"=>"Employee not found"
            ],404);

        }

    }
    //delete API   --delete
    public function deleteEmployee($id){
        if(Employee::where("id",$id)->exists()){
            $employee=Employee::find($id);
            $employee->delete();
            return response()->json([
                "status"=>1,
                "message"=>"Employee delete successfully"
            ]);

        }else{
            return response([
                "status"=>0,
                "message"=>"Employee not found"
            ],404);

        }

    }
}
