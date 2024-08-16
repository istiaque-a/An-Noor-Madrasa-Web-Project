@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Jobs </div>

                <div class="card-body">
                    
                     <div class="container">
                        <?php
                          if($approved==0){
                            ?>
                            <h2>Unapproved Jobs</h2>

                            <?php

                          }elseif($approved==1){
                            ?>

                            <h2>Approved Jobs</h2>
                            <?php


                          }

                          for($i=0; $i<count($jobs); $i++){

                            $job_found=$jobs[$i];

                            $job_heading = $job_found->job_heading;
                            $expiry_date = $job_found->end_date ;
                            $job_id=$job_found->id;




                            ?>

                            <div class="job_indiv"><?php echo ($i+1).') '. $job_heading.'. Expiry date: '.$expiry_date; ?>   <a href="<?php echo URL('/job/details/'.$job_id); ?>">Details</a></div><!-- end of class job_indiv-->


                            <?php



                          }//end of for loop
                        ?>
                              
            
                     </div>

                     
                     
                    {{ $jobs->links('vendor.pagination.default') }}


                </div>
             </div>
          </div>
      </div>
</div>
@endsection
