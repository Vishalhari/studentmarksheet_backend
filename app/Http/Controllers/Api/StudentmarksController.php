<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Subjects;
use App\Models\Studentmarks;

class StudentmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentmarks = Studentmarks::select('id','student_name','subjectid','marks')
                        ->with('subjects')
                        ->orderBy('student_name')
                        ->get();
        return response()->json(['success' => true, 'data' =>$studentmarks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'student_name' => ['required', 'string'],
            'subjectid' => ['required'],
            'marks' => ['required']
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $studentname = $request->student_name;
        $subjectid = $request->subjectid;

        $subjectexist = Studentmarks::where('student_name',$studentname)
                        ->where('subjectid',$subjectid)
                        ->count();

        if($subjectexist ==0){
            $studmarks = new Studentmarks();
            $studmarks->student_name =  $studentname;
            $studmarks->subjectid =  $subjectid;
            $studmarks->marks =  $request->marks;
            $studmarks->save();
        } else{
            $subjectexist = Studentmarks::where('student_name',$studentname)
            ->where('subjectid',$subjectid)
            ->first();
            $rowid = $subjectexist->id;

            $studmarks = Studentmarks::find($rowid);
            $studmarks->marks =  $request->marks;
            $studmarks->save();
        }

        return response()->json(['success' => true, 'data' =>$studmarks]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'student_name' => ['required', 'string'],
            'subjectid' => ['required'],
            'marks' => ['required']
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }

        $studmarks = Studentmarks::find($id);
        $studmarks->student_name =  $request->student_name;
        $studmarks->subjectid =  $request->subjectid;
        $studmarks->marks =  $request->marks;
        $studmarks->save();

        return response()->json(['success' => true, 'data' =>$studmarks]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Studentmarks::where('id',$id)->delete();
        return response()->json(['success' => true, 'message' =>'Sucessfully Deleted']);
    }


    public function get_subjects() {
        $subjects = Subjects::all();
        return response()->json(['success' => true,'data'=>$subjects]);
    }
}
