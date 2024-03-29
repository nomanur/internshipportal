<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentGroup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        /*$userId = Auth::User()->id;

        $StudentGroupId = StudentGroup::where('user_id', '=', $userId)->first();
        $StudentGroupUserId = $StudentGroupId->user_id;
        $group = new StudentGroup();

        $group->user_id = $userId;
        $group->group_status = $request->group_status;
        
        if (($StudentGroupUserId == Auth::user()->id)) {

            $StudentGroupId->user_id = $userId;
            $StudentGroupId->group_status = $request->group_status;

            $StudentGroupId->save();
         }else{
            $group->save();
         }*/

        $user = Auth::User();

        
        $group = new StudentGroup();

        $group->user_id = $user->id;
        $group->group_status = $request->group_status;


        //$StudentGroupId = StudentGroup::where('user_id', '=', $userId)->exist();
        //$StudentGroupUserId = $StudentGroupId->user_id;

        if (StudentGroup::where('user_id', '=', $user->id)->exists()) {
            $StudentGroupId = StudentGroup::where('user_id', '=', $user->id)->first();
            $StudentGroupId->user_id = $user->id;
            $StudentGroupId->group_status = $request->group_status;

            $StudentGroupId->save();
         }else{
            $group->save();
         }
    
         return redirect('student/dashboard/academicInfo/'. $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function academicInfo()
    {
        //return 'ok';
    }
}
