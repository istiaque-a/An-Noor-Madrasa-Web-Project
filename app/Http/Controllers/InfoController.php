<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Http\Requests\StoreInfoRequest;
use App\Http\Requests\UpdateInfoRequest;
use Illuminate\Http\Request;

class InfoController extends Controller
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



    public function about_us(Request $request ){


         $about_us_result =Info::where(array('info_name'=>trim('aboutus')))->get();

         $aboutus="";

         if(count($about_us_result)!=0){

               $about_us_query =Info::where(array('info_name'=>'aboutus'))->get();            

               foreach($about_us_query as $about_us_indiv){

                      $aboutus=$about_us_indiv['info_content'];

               }//end of foreach loop

         }

         echo '<span class="success">Done !!</span>';

        return view('about_us', compact('aboutus'));


    }// end of function about_us //




    public function mission(Request $request ){


         $mission_result =Info::where(array('info_name'=>trim('mission')))->get();

         $mission="";

         if(count($mission_result)!=0){

               $mission_query =Info::where(array('info_name'=>'mission'))->get();            

               foreach($mission_query as $mission_indiv){

                      $mission=$mission_indiv['info_content'];

               }//end of foreach loop

         }

         echo '<span class="success">Done !!</span>';

        return view('mission', compact('mission'));


    }// end of function mission //




    public function vision(Request $request ){


         $vision_result =Info::where(array('info_name'=>trim('vision')))->get();

         $vision="";

         if(count($vision_result)!=0){

               $vision_query =Info::where(array('info_name'=>'vision'))->get();            

               foreach($vision_query as $vision_indiv){

                      $vision=$vision_indiv['info_content'];

               }//end of foreach loop

         }

         echo '<span class="success">Done !!</span>';

        return view('vision', compact('vision'));


    }// end of function vision //


    public function add_vision_now(Request $request)
    {

        $vision_body=$request->input('vision_body');
         $vision_result =Info::where(array('info_name'=>trim('vision')))->get();

         if(count($vision_result)==0){

                Info::create(array('info_name'=>'vision','info_content'=>$vision_body));            

         }else{

            $vision_result =Info::where(array('info_name'=>trim('vision')))->update(['info_content'=>$vision_body]);
         }

         echo '<span class="success">Done !!</span>';

        
    }// end of function add_vision_now


    public function aboutus_get_api(Request $request)
    {
        $info=Info::where(array('info_name'=>'aboutus'))->get();

        // $info=FoundationActivity::where(array('id'=> $id ))->get();
        return response()->json($info, 200);



    }// end of function aboutus_get_api


    public function mission_get_api(Request $request){

        $info=Info::where(array('info_name'=>'mission'))->get();

        // $info=FoundationActivity::where(array('id'=> $id ))->get();
        return response()->json($info, 200);


    }//end of function mission_get_api


    public function vision_get_api(Request $request){

        $info=Info::where(array('info_name'=>'vision'))->get();

        // $info=FoundationActivity::where(array('id'=> $id ))->get();
        return response()->json($info, 200);

    }//end of function vision_get_api



    public function contactus_get_api(Request $request)
    {

        $info=Info::where(array('info_name'=>'contactus'))->get();

        // $info=FoundationActivity::where(array('id'=> $id ))->get();
        return response()->json($info, 200);
        

    }


    

    public function add_aboutus_now(Request $request)
    {

        $aboutus_body=$request->input('aboutus_body');
         $about_us_result =Info::where(array('info_name'=>trim('aboutus')))->get();

         if(count($about_us_result)==0){

                Info::create(array('info_name'=>'aboutus','info_content'=>$aboutus_body));            

         }else{

            $about_us_result =Info::where(array('info_name'=>trim('aboutus')))->update(['info_content'=>$aboutus_body]);
         }

         echo '<span class="success">Done !!</span>';

        
    }// end of function add_aboutus_now



    public function add_mission_now(Request $request)
    {
        $mission=$request->input('mission_body');
         $mission_result =Info::where(array('info_name'=>trim('mission')))->get();

         if(count($mission_result)==0){

                Info::create(array('info_name'=>'mission','info_content'=>$mission));            

         }else{

            $mission_result =Info::where(array('info_name'=>trim('mission')))->update(['info_content'=>
                $mission]);
         }

         echo '<span class="success">Done !!</span>';
    }



    public function contactus(Request $request)
    {
        


         $contactus_result =Info::where(array('info_name'=>trim('contactus')))->get();

         $contactus="";

         if(count($contactus_result)!=0){

               $contactus_query =Info::where(array('info_name'=>'contactus'))->get();            

               foreach($contactus_query as $contactus_indiv){

                      $contactus=$contactus_indiv['info_content'];

               }//end of foreach loop

         }

         echo '<span class="success">Done !!</span>';

        return view('contactus', compact('contactus'));

    }


    public function contactus_input_now(Request $request)
    {
        
        $contactus=$request->input('contactus_body');
         $contactus_result =Info::where(array('info_name'=>trim('contactus')))->get();

         if(count($contactus_result)==0){

                Info::create(array('info_name'=>'contactus','info_content'=>$contactus));            

         }else{

            $contactus_result =Info::where(array('info_name'=>trim('contactus')))->update(['info_content'=>
                $contactus]);
         }

         echo '<span class="success">Done !!</span>';
    }



  


    public function feedback_insert(Request $request){

        $request->input('feedback');


    }//end of function feedback_insert

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInfoRequest  $request
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfoRequest $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
