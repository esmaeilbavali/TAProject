<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private $teachers = [
        [
            'id' => 1,
            'name' => 'teacher1',
            'family' => 'teacher1Family'
        ],
        [
            'id' => 2,
            'name' => 'teacher2',
            'family' => 'teacher2Family'
        ]
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'teachers' => $this->teachers
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
        $teacher = [
            'id' => $request->id,
            'name' => $request->name,
            'family' => $request->family
        ];

        $this->teachers[] = $teacher;
        
        return response()->json([
            'message' => 'teacher successfully added',
            'teachers' => $this->teachers
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (!isset($this->teachers[$id]))
            return response()->json([
                'message' => 'teacher not found',
                'errCode' => 408
            ]);

        $teacher = $this->teachers[$id];
        
        return response()->json([
            'teacher' => $teacher
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
        if (!isset($this->teachers[$id]))
        return response()->json([
            'message' => 'teacher not found',
            'errCode' => 408
        ]);

    $teacher = $this->teachers[$id];
    if(!$request->name){
        $request->name = $teacher['name'];
    }
    
    if(!$request->family){
        $request->family = $teacher['family'];
    }
    $teacher = [
        'name' => $request->name,
        'family' => $request->family
    ];
    
    
    return response()->json([
        'teacher' => $teacher
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
        if (!isset($this->teachers[$id]))
        return response()->json([
            'message' => 'teacher not found',
            'errCode' => 408
        ]);

        unset($this->teachers[$id]);
    
        return response()->json([
            'teacher' => $this->teachers
        ]);
    }
}
