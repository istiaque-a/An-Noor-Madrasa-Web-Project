<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Http\Requests\StoreDonorRequest;
use App\Http\Requests\UpdateDonorRequest;
use Illuminate\Http\Request;

class DonorController extends Controller
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
     * @param  \App\Http\Requests\StoreDonorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function show(Donor $donor)
    {
        //
    }



    public function donors_all_typewise(Request $request, $donorTypeId)
    {
        $donors=Donor::get();

        $donors_all=[];
        $donors_all_found=[];

        foreach($donors as $donor){

            $donor_type=$donor->donor_type;
            $donor_type_array = explode(',',$donor_type);

            // echo "donorTypeId  = ".$donorTypeId;

            // echo " in array = ".in_array($donorTypeId, $donors_all);
            if(in_array($donorTypeId, $donor_type_array)){

                $donor_found=[];
                $donor_found['id']=$donor->id;
                $donor_found['name']=$donor->name;
                $donors_all_found[]=$donor_found;



            }// end of if loop
            


        }// end of foreach loop

        $donors_all['donors']=$donors_all_found;

        return response()->json($donors_all, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDonorRequest  $request
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonorRequest $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donor $donor)
    {
        //
    }
}
