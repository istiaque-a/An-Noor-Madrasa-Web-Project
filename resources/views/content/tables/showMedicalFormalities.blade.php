@extends('layouts/contentNavbarLayout')

@section('title', 'Medical Formalities')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Medical Formalities
  
</h4>


@include('content.tables.candidate-section-headings')


          <?php


              if(gettype($user)==trim('string')){

                ?>

                

                <h4 class="text-center text-danger mt-5"><?php  echo $user; ?></h4>


                <?php



              }else{


                ?>
<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    

    <div class="row">

      <div class="col-sm-6_0000">

        <div id="document_person_photo">



               
          <?php 

            $default_image=URL::to('/assets/img/avatars/1.png');
          ?>
          <img  src="{{URL::to('/thumbnails/passport_size_photo/'.$user->passport_size_photo )}}" alt="photo" onerror="this.onerror=null; this.src='<?php echo $default_image; ?>'"  />
          
        </div><!-- end of id smart_card_person_photo -->

        <div id="smart_card_person_name" class="text-center fw-bold mt-3">
          <?php

            echo $user->first_name.' '.$user->middle_name.' '.$user->last_name;

          ?>
          
        </div><!-- end of id smart_card_person_name -->

        <div id="smart_card_person_passport_no" class="fw-bold text-center">
          Passport No: <?php echo $user->passport_num; ?>
        </div><!-- end of id smart_card_person_passport_no -->
        
        <div id="smart_card_person_passport_status" class="indiv_status_show rounded text-center p-3 mt-3 mb-3 float-start_0000 fw-bold">
          STATUS: APPROVED
        </div><!-- end of id smart_card_person_passport_status-->
        <div class="clearfix"></div>
      </div><!-- end of col-sm-6 -->

      <!-- <div class="col-sm-6_000" >

        <div class="text-end">

            <div id="document_itself_photo">

                      
                
                <a href="{{URL::to('/uploads/medical_photo/'.$user->vaccine_photo)}}" data-fancybox="images" data-caption="Medical record">
                    <img  src="{{URL::to('/thumbnails/medical_photo/'.$user->vaccine_photo)}}" alt="photo" />
                </a>
            </div>

            
        
          
        </div>
        
      </div> -->



      <!-- end of col-sm-6 -->


      <div id="user_docs_all">

        <?php

            foreach($docs_all as $doc_indiv){

              $pdf_doc=$doc_indiv->pdf_doc;
              
              $is_pdf=0;
              
              if($pdf_doc){

                $is_pdf=1;

              }
              $large_image= $doc_indiv->large_image ;
              $thumbnail= $doc_indiv->thumbnail ;

              // echo " is pdf = ".$is_pdf;

              $description = $doc_indiv->description;

              $default_image= URL::to('/assets/img/doc.png');

              if(!$is_pdf){

                ?>

                <div class="user_doc_indiv_wrapper">
                <div class="user_doc_indiv">



                  <a href="{{URL::to('/uploads/medical_photo/'.$large_image )}}" data-fancybox="images" data-caption="<?php echo $description; ?>">
                    <img  src="{{URL::to('/thumbnails/medical_photo/'.$thumbnail)}}"  onerror="this.onerror=null;this.src='<?php echo $default_image; ?>';" alt="photo" />
                    
                </a>
                
                </div><!-- end of class user_doc_indiv-->
                <div class="user_doc_indiv_description text-center">{{$description}}</div>
              </div>


                <?php

              }else{

                ?>
              
              <div class="user_doc_indiv_wrapper">
                <div class="user_doc_indiv">

                    <a href="{{URL::to('/uploads/medical_photo/'.$pdf_doc )}}" data-fancybox="iframe" data-caption="<?php echo $description; ?>">
                    
                    <img  src="{{URL::to('/assets/img/pdf.png')}}" alt="pdf" />
                    
                </a>
                

                  
                </div><!-- end of class user_doc_indiv-->

                <div class="user_doc_indiv_description text-center">{{$description}}</div>

              </div><!-- end of class user_doc_indiv_wrapper -->



                <?php



              }

              ?>


              
                





              <?php


            }//end of for loop

        ?>


        <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>

      </div><!-- end of id user_docs_all-->


      
    </div><!-- end of row  -->


  </div>
</div><!-- end of class card -->
<!--/ Bordered Table -->



<div id="back_to_home" class=" float-end text-center rounded mt-3">
  <a href="#" class="p-2 d-inline-block text-center">
  Back to Home
  </a>
</div><!-- end of id back_to_home -->

          <?php


                  }// end of else of if gettype == string

          ?>


<div class="clearfix"></div>

<style type="text/css">

  #user_docs_all{

    display: inline-block;
    text-align: center;
  }

  .user_doc_indiv{
    
    width: 100%;
    height: 0;
    padding-bottom: 70%;

  } 
 .user_doc_indiv_wrapper{
  width: 15%;
  height: 0;
  padding-bottom: 13%;
  border: 1px solid red;
  display: inline-block;
  margin-right: 10px;
}
.user_doc_indiv_description{
  color: red;
  font-weight: bold;
}
.indiv_status_show{

  width: 250px;
  margin: 0 auto;

}
</style>
@endsection

@section('vendor-script')

<style type="text/css">
  .show-medical-formalities{
    background-color: #009C10;

  }
</style>
<script type="text/javascript">
  
  $(document).ready(function(){

    $('#document_person_photo').imagefill();
    $("#document_itself_photo").imagefill();
    $(".user_doc_indiv").imagefill();


  });
</script>

 
@endsection
