@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Activity </div>

                <div class="card-body">
                    <div id="result" class="text-center"></div>
                     <div class="container">

                        <b>Activity Details</b><br/>


                                                <?php
                         

                          // for($i=0; $i<count($activities); $i++){

                            $activity_indiv=$activity_info;

                            $activity_heading = $activity_indiv->activity_heading;
                            $activity_body = $activity_indiv->activity_body ;
                            $activity_type = $activity_indiv->activity_type ;
                            $activity_cat = $activity_indiv->activity_cat ;
                            $url = $activity_indiv->url;

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

                            <div class="job_indiv"><?php echo ' Name: '. $activity_heading;

                            if($activity_cat!=4){

                                echo '<br/> Activity Body : '.$activity_body;  
                            }

                            
                             ?>
                            <br/> Category: <?php echo $activity_cat_name; ?> <br/>

                            <?php 
                             if($activity_type!=0){
                              ?>

                                Activity Type : <?php echo $activity_type_name; ?>  

                              <?php

                             }

                             if($activity_cat==4){

                              if( substr( $url, 0, 4 ) !== "http" && substr( $url, 0, 5 ) !== "https"){

                                $url="http://".$url;

                              }

                              ?>

                              URL: <a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a>

                              <?php

                             }

                            ?>
                            
                            </div><!-- end of class job_indiv-->


                            <?php



                          // }//end of for loop
                        ?>
                              


                        
                       


                              
            
                     </div>

                     
                     
                    


                </div>
             </div>
          </div>
      </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){


     
    });
</script>
@endsection
