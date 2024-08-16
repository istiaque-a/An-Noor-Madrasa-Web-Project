<?php

namespace App\Http\Controllers;

use App\Models\TeacherStaff;
use App\Http\Requests\StoreTeacherStaffRequest;
use App\Http\Requests\UpdateTeacherStaffRequest;

use Illuminate\Http\Request;


class TeacherStaffController extends Controller
{

    public function __construct()
        {
            /*$this->middleware('auth', ['only' => 'index']);*/

            // $this->middleware('auth');
        }
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
     * @param  \App\Http\Requests\StoreTeacherStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherStaff  $teacherStaff
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherStaff $teacherStaff)
    {
        //
    }



    public function get_teachers_staff(Request $request, $current_or_ex){


        // echo " type found = ".$current_or_ex;

        $page=$request->input('_page');
            $limit=$request->input('_limit');
            $user_id = $request->input('user_id');




            $teacher_staff_all=[];
            

            $skip=$page*$limit;

            $teacher_staff_all=TeacherStaff::where(array('ex_or_current'=>$current_or_ex,'approved'=> 1))->orderBy('id','desc')->skip($skip)->take($limit)->get();


            // $teacher_staff_all=TeacherStaff::
            // where(array('ex_or_current'=>$current_or_ex))
            //->
            // orderBy('id','desc')->skip($skip)->take($limit)->get();



            return response()->json($teacher_staff_all, 200);
                





    }//end of method get_teachers_staff

    public function get_teachers_staff_indiv(request $request, $id)
    {
        $info=TeacherStaff::where(array('id'=> $id ))->get();
        return response()->json($info, 200);

    }//end of function get_teachers_staff_indiv

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherStaff  $teacherStaff
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherStaff $teacherStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherStaffRequest  $request
     * @param  \App\Models\TeacherStaff  $teacherStaff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherStaffRequest $request, TeacherStaff $teacherStaff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherStaff  $teacherStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherStaff $teacherStaff)
    {
        //
    }
}
