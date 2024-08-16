@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Activities </div>

                <div class="card-body">
                    
                     <div class="container">
                        <?php
                         
                         $page=app('request')->input('page');
                         if(empty($page)){

                          $page=1;

                         }else{


                         }

                         

                          for($i=0; $i<count($activities); $i++){

                            $activity_indiv=$activities[$i];

                            $activity_heading = $activity_indiv->activity_heading;
                            $activity_body = $activity_indiv->activity_body ;
                            $activity_type = $activity_indiv->activity_type ;
                            $activity_cat = $activity_indiv->activity_cat ;

                            $activity_type_name="";  
                            if($activity_type==1){

                              $activity_type_name="Past";

                            }else if($activity_type==2){

                              $activity_type_name="Present";

                            }else if($activity_type==3){

                              $activity_type_name="Future";

                            }

                            $activity_cat_name="";

                            if($activity_cat==1){

                              $activity_cat_name="Mosque";


                            }else if($activity_cat==2){

                              $activity_cat_name="Madrasa";


                            }else if($activity_cat==3){

                              $activity_cat_name=" An Noor Foundation";


                            }else if($activity_cat==4){

                              $activity_cat_name="An Noor Online Media  ";

                            }


                            






                            $activity_id=$activity_indiv->id;




                            ?>

                            <div class="job_indiv"><?php echo (($page-1)*10+$i+1).') '. $activity_heading.'. type: '.$activity_cat_name; ?>   
                            <a href="<?php echo URL('/activity/details/'.$activity_id); ?>">Details</a></div><!-- end of class job_indiv-->


                            <?php



                          }//end of for loop
                        ?>
                              
            
                     </div>
                     
                     
                     
                    {{ $activities->links('vendor.pagination.default') }}


                </div>
             </div>
          </div>
      </div>
</div>
@endsection
