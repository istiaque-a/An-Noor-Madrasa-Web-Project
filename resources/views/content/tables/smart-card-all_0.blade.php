@extends('layouts/contentNavbarLayout')

@section('title', 'Smart Card')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Smart Card
  
</h4>


@include('content.tables.candidate-section-headings')



<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    

    <div class="row">

      <div class="col-sm-6">

        <div id="smart_card_person_photo">

          <img  src="https://via.placeholder.com/85x100" alt="photo" />
          
        </div><!-- end of id smart_card_person_photo -->

        <div id="smart_card_person_name" class="text-start fw-bold mt-3">
          Saiful Islam Rana
          
        </div><!-- end of id smart_card_person_name -->

        <div id="smart_card_person_passport_no" class="fw-bold text-start">
          Passport No: A01223232
        </div><!-- end of id smart_card_person_passport_no -->
        
        <div id="smart_card_person_passport_status" class="rounded text-center p-3 mt-4 float-start fw-bold">
          STATUS: APPROVED
        </div><!-- end of id smart_card_person_passport_status-->
        <div class="clearfix"></div>
      </div><!-- end of col-sm-6 -->

      <div class="col-sm-6">

        <div class="text-center">

            <img  src="https://via.placeholder.com/320x160" alt="passport photo" />
        
          
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

<div class="clearfix"></div>


@endsection

@section('vendor-script')

<script type="text/javascript">
  
  $(document).ready(function(){

      $('.first.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#6C5DD3',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });


  $('.second.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#F98338',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });




  $('.third.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#2ED480',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });


  $('.fourth.circle').circleProgress({
    value: 0.6,
    thickness:10,
    fill:'#FE6D8E',
    size:40,
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });


  });
</script>

 
@endsection
