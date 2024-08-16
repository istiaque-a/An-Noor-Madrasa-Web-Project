@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Results </div>

                <div class="card-body">
                    
                     <div class="container">
                        <?php
                          

                          for($i=0; $i<count($results); $i++){

                            $result_found=$results[$i];

                            $exam_name = $result_found->exam_name;
                            $publish_date = $result_found->publish_date ;
                            $url=$result_found->url;

                            $result_id = $result_found->id;




                            ?>

                            <div class="job_indiv"><?php echo ($i+1).') '. $exam_name.'. Publish date: '.$publish_date; ?>   <a href="<?php echo URL('/result/details/'.$result_id); ?>">Details</a></div><!-- end of class job_indiv-->


                            <?php



                          }//end of for loop
                        ?>
                              
            
                     </div>

                     
                     
                    {{ $results->links('vendor.pagination.default') }}


                </div>
             </div>
          </div>
      </div>
</div>
@endsection
