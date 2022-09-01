<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\PaymentSchedule;
use Response;
use App\Models\PaymentSchedule;

class PaymentScheduleController extends Controller
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
        return view('content.payment.create-payment-schedule');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=array(
                'schedule_name'=> 'required|unique:payment_schedules|unique_space_check:payment_schedules',
                'amount'=> 'required|gt:0|numeric',
                'last_date'=>'required|date'
        );

        $validator= \Validator::make($request->all(), $rules);

        
        if($validator->fails()){

            return Response::json(array(

                    'success'=> false,
                    'errors'=> $validator->getMessageBag()->toArray()
            ),400);

        }
        $schedule_name = $request->schedule_name;
        $amount= $request->amount;
        $last_date = $request->last_date;

        $last_date_array = explode('-',$last_date);
        $last_date_formatted=$last_date_array[2].'-'.$last_date_array[1].'-'.$last_date_array[0];


        

        $payment_schedule= new PaymentSchedule();
        $payment_schedule->schedule_name= $schedule_name;
        $payment_schedule->amount=$amount;
        $payment_schedule->last_date= $last_date_formatted;

        $payment_schedule->save();

        return Response::json(array(
            'success'=>true
        ),200);


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
}
