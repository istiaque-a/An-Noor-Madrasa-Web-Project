<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentSchedule;
use App\Models\User;
use Response;
class PaymentController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $payment_schedules= PaymentSchedule::get();
        $agents = User::where('user_type',1)->get();

        return view('content.payment.make-payment', compact('payment_schedules','agents'));  
    }


    public  function fetch_candidates_agentwise(Request $request){

        $agent_id = $request->agent_id;

        $candidates=User::where('added_by',$agent_id);
        echo "candidates sql =  ".$candidates->toSql();
        $candidates->get();

        return Response::json($candidates);



    }// end of function fetch_candidates_agentwise

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

     

     /**
     * Store a newly created schedult in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
}
