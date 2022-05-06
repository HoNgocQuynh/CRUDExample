<?php

namespace App\Http\Controllers\API;

//use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'status' => 200,
            'students' => $students
        ]);
    }
    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student
        ]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->update();
        return response()->json([
            'status' => 200,
            'message' => 'Student Updated Successfully'
        ]);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Student detroy Successfully'
        ]);
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:191',
        //     'course' => 'required|max:191',
        //     'email' => 'required|email|max:191',
        //     'phone' => 'required|max:10|min:10|numeric',
        // ]);
        // if ($validated) {
        //     return response()->json([
        //         'validate_err' => $validated,
        //     ]);
        // } else {
            $student = new Student;
            $student->name = $request->input('name');
            $student->course = $request->input('course');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully'
            ]);
    // }
    }
}
