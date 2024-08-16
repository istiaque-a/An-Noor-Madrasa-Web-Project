@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Feedback </div>

                <div class="card-body">
                    
                     <div class="container" style="min-height:300px;">



                            <?php


                          if($feedback_all!=null){

                          

                          for($i=0; $i<count($feedback_all); $i++){

                            $feedback_indiv=$feedback_all[$i];

                            $feedback = $feedback_indiv->feedback;
                            $user_id = $feedback_indiv->user_id ;
                            // $job_id=$feedback_found->id;

                            $person_name_found =$person_names[$i];




                            ?>

                            <div class="job_indiv"><?php echo ($i+1).') '. $feedback.'. From : '.$person_name_found; ?>
                            </div><!-- end of class job_indiv-->


                            <?php



                          }//end of for loop

                          }else{
                            ?>

                            <div style="font-size:18px;">No results found</div>


                                <?php



                          }  //end of else of  if($feedback_all!=null){
                        ?>


                     </div>

                     {{ $feedback_all->links('vendor.pagination.default') }}

                     
                     
                    


                </div>
             </div>
          </div>
      </div>
</div>
@endsection
