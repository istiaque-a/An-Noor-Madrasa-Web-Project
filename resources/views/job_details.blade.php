@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Jobs </div>

                <div class="card-body">
                    <div id="result" class="text-center"></div>
                     <div class="container">

                        Job Details<br/>

                        
                            <?php
                                  $job_heading="";
                                  $job_description="";
                                  $expiry_date_formatted="";
                                  $approved=0;

                                  for($i=0; $i<count($jobs); $i++){

                                    $job_found=$jobs[0];

                                    $job_heading=$job_found->job_heading;

                                    $job_description= $job_found->job_description;

                                    $expiry_date = $job_found->end_date ;
                                    
                                    $expiry_date_array = explode('-',$expiry_date);

                                    $expiry_date_formatted = $expiry_date_array[2].'-'.$expiry_date_array[1].'-'.$expiry_date_array[0];

                                    $approved = $job_found->approved;        


                                  }//end of for loop

                                


                            

                            $status="";

                            if($approved==1){

                                $status="Approved";

                            }else if($approved==0){

                                $status ="Unapproved";

                            }




                            ?>

                            <div class="job_indiv">
                                


                                Job Name: <?php echo $job_heading; ?><br/>
                                Job Details: <?php echo $job_description; ?><br/>
                                Expiry date: <?php echo $expiry_date_formatted; ?><br/>
                                Status: <?php echo $status; ?><br/>

                                <?php
                                    if($approved==0){
                                        ?>

                                        <a class="approve_disapprove_now" data-approved="<?php echo  $approved; ?>" href="javascript:void(0)">Approve Now</a>


                                        <?php

                                    }else{
                                        ?>

                                        <a class="approve_disapprove_now" data-approved="<?php echo  $approved; ?>" href="javascript:void(0)">Dispprove Now</a>

                                        <?php
                                    }    

                                ?>



                            </div><!-- end of class job_indiv-->


                              
            
                     </div>

                     
                     
                    


                </div>
             </div>
          </div>
      </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){


        $(".approve_disapprove_now").click(function(){
            $elem = $(this);

            var approved_found =$elem.data('approved');

            $("#result").html('<span class="wait">Please wait....</span>');
            

            var url_found='{{route('approve_disapprove_job_now')}}';
            var _token="{{ csrf_token() }}";
            var job_id = '<?php echo $id; ?>';

            $.ajax({
                method:"POST",
                url: url_found,
                data:{"_token": _token ,'job_id':job_id, 'approved_found':approved_found},
                        success:function(data, status, xhr){

                           if(approved_found==0){

                              approved_found=1;

                           }else if(approved_found==1){

                              approved_found=0;

                           }

                           

                           if(data ==1 ){

                                $("#result").html('<span class="wait">Done! Please wait...</span>');

                                location.reload();

                              

                           }

                        },
                        error: function(jqXhr, textStatus, errorMessage){

                        }
            });

            




        });
    });
</script>
@endsection
