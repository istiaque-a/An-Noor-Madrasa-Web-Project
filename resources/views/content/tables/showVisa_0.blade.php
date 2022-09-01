@extends('layouts/contentNavbarLayout')

@section('title', 'Visa Stamping/E-visa')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <?php

  $full_name='';
    if(gettype($user)!=trim('string')){

        $full_name=$user->first_name.' '.$user->last_name;
    }
  ?>
  <span class="text-muted fw-light">Home -> Candidate -> <?php echo $full_name; ?> </span>
   
  
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

      <div class="col-sm-6">

        <div id="document_person_photo">

               

          <img  src="{{URL::to('/thumbnails/passport_size_photo/'.$user->passport_size_photo )}}" alt="photo" />
          
        </div><!-- end of id smart_card_person_photo -->

        <div id="smart_card_person_name" class="text-start fw-bold mt-3">
          <?php

            echo $user->first_name.' '.$user->last_name;

          ?>
          
        </div><!-- end of id smart_card_person_name -->

        <div id="smart_card_person_passport_no" class="fw-bold text-start">
          Passport No: <?php echo $user->passport_num; ?>
        </div><!-- end of id smart_card_person_passport_no -->
        
        <div id="smart_card_person_passport_status" class="rounded text-center p-3 mt-4 float-start fw-bold">
          STATUS: APPROVED
        </div><!-- end of id smart_card_person_passport_status-->
        <div class="clearfix"></div>
      </div><!-- end of col-sm-6 -->

      <div class="col-sm-6" >

        <div class="text-end">

            <div id="document_itself_photo">

              <!-- <p class="imglist" style="max-width: 1000px;"> -->
                      
                
                <a href="{{URL::to('/uploads/visa_stamping_photo/'.$user->visa_stamping_photo)}}" data-fancybox="images" data-caption="Visa document">
                    <img  src="{{URL::to('/thumbnails/visa_stamping_photo/'.$user->visa_stamping_photo )}}" alt="photo" />
                </a>
            </div><!--end of id document_itself_photo -->

            
        
          
        </div>
        
      </div><!-- end of col-sm-6 -->


      
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


@endsection

@section('vendor-script')

<style type="text/css">
  .show-visa{
    background-color: #009C10;

  }
</style>
<script type="text/javascript">
  
  $(document).ready(function(){

    $('#document_person_photo').imagefill();
    $("#document_itself_photo").imagefill();


  });
</script>

 
@endsection
