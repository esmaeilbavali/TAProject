<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::All();

        return response()->json([
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();

        $student->name = $request->name;
        $student->family = $request->family;
        $student->average = $request->average;

        $student->save();

        return response()->json([
            'message' => 'successfully added',
            'id' => $student->id
        ]);


    }
// for second commit
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student)
            return response()->json([
                'message' => 'student not found',
                'error' => 402
            ]);

        return response()->json([
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student)
            return response()->json([
                'message' => 'student not found',
                'error' => 499
            ]);
        
        $name  = $request->name;

        $student->name = $request->name;
        $student->family = $request->family;
        $student->average = $request->average;
        $student->update();

        return response()->json([
            'message' => 'student successfully updated',
            'student' => $student
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);

        return response()->json([
            'message' => 'student successfully deleted',
        ]);
    }
}
