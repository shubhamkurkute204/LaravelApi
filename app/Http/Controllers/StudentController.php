<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentdetails;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function list()
    {
        return studentdetails::all();
        // return "List function is called!";

    }

    function AddStudents(Request $request)
    {
        $validateData = [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'city' => 'nullable|string|max:255'
        ];

        $validator = Validator::make($request->all(), $validateData);

        if ($validator->fails()) {
            $data["error"] = true;
            $data["message"] = $validator->errors();
            return response()->json($data);
        } else {
            $student = new studentdetails();
            $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;
            $student->mobile_number = $request->mobile_number;
            $student->email = $request->email;
            $student->city = $request->city;

            if ($student->save()) {
                return ["result" => "Record added successfully!"];
            } else {
                return ["result" => "Operation Failed!"];
            }
        }
    }


    function DeleteStudents(Request $request)
    {
        $validateData = [
            'id' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $validateData);

        if ($validator->fails()) {
            $data["error"] = true;
            $data["message"] = $validator->errors();
            return response()->json($data);
        } else {
            $student = studentdetails::destroy($request->id);

            if ($student) {
                return ["result" => "Record deleted sucessfully!"];
            } else {
                return ["result" => "Operation Failed!"];
            }
        }
    }

    function GetSingleRecord(Request $request)
    {
        $validateData = [
            'id' => 'required|integer'
        ];

        $validator = Validator::make($request->all(), $validateData);

        if ($validator->fails()) {
            $data["error"] = true;
            $data["message"] = $validator->errors();
            return response()->json($data);
        } else {
            $student = studentdetails::find($request->id);
            return response()->json($student);

            if ($student) {
                return response()->json($student); // Return the record
            } else {
                return response()->json(['message' => 'Student record not found'], 404); // Return a 404 response
            }
        }
    }

    function UpdateStudents(Request $request)
    {
        $validateData = [
            'id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'city' => 'nullable|string|max:255'
        ];

        $validator = Validator::make($request->all(), $validateData);

        if ($validator->fails()) {
            $data["error"] = true;
            $data["message"] = $validator->errors();
            return response()->json($data);
        } else {
            $student = studentdetails::find($request->id);
            $student->first_name = $request->first_name;
            $student->middle_name = $request->middle_name;
            $student->last_name = $request->last_name;
            $student->mobile_number = $request->mobile_number;
            $student->email = $request->email;
            $student->city = $request->city;

            if ($student->save()) {
                return ["result" => "Record updated sucessfully!"];
            } else {
                return ["result" => "Operation Failed!"];
            }
        }
    }
}
