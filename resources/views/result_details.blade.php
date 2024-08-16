@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Result</div>

                <div class="card-body">
                    <div id="result" class="text-center"></div>
                     <div class="container">

                        Result Details<br/>

                        
                            <?php
                                  $exam_name="";
                                  $publish_date="";
                                  $url="";
                                  $approved=0;

                                  if($result){

                                  	$exam_name = $result->exam_name;

                                  	$publish_date = $result->publish_date;
                                  	$publish_date_array =explode('-',$publish_date);

                                  	$publish_date_formatted=$publish_date_array[2].'-'.$publish_date_array[1].'-'.$publish_date_array[0];

                                  	$url = $result->url;


                                  }


                            

                            $status="";


                            ?>

                            <div class="job_indiv">
                                


                                Exam Name: <?php echo $exam_name; ?><br/>
                                Publish Date: <?php echo $publish_date_formatted; ?><br/>

                                <?php

                                  if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
									   

									}else{
										$url ='http://'.$url;
									}

                                ?>
                                
                                Url: <a href="<?php echo $url; ?>"><?php echo $url; ?></a><br/>

                                



                            </div><!-- end of class job_indiv-->


                              
            
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
