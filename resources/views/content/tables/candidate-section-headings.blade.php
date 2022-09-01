<div id="candidates_sections_heading_all">

  <div class="candidates_sections_heading_indiv show-personal-details float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-personal-details/'.request()->segment(count(request()->segments()))) ?>">Personal Details</a>
  </div><!-- end of function candidates_sections_heading_indiv -->


  <div class="candidates_sections_heading_indiv  show-medical-formalities float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-medical-formalities/'.request()->segment(count(request()->segments()))) ?>">Medical Formalities</a>
  </div><!-- end of function candidates_sections_heading_indiv -->
  

  <div class="candidates_sections_heading_indiv  show-working float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-working/'.request()->segment(count(request()->segments()))) ?>">Working Selection</a>
  </div><!-- end of function candidates_sections_heading_indiv -->


  <div class="candidates_sections_heading_indiv show-calling float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-calling/'.request()->segment(count(request()->segments()))) ?>">Calling Process</a>
  </div><!-- end of function candidates_sections_heading_indiv -->

  <div class="candidates_sections_heading_indiv show-visa float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-visa/'.request()->segment(count(request()->segments()))) ?>">Visa Stamping</a>
  </div><!-- end of function candidates_sections_heading_indiv -->


  <div class="candidates_sections_heading_indiv show-smart-card float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-smart-card/'.request()->segment(count(request()->segments()))) ?>">Smart Card</a>
  </div><!-- end of function candidates_sections_heading_indiv -->

  <div class="candidates_sections_heading_indiv show-flight float-start mb-2 me-2 p-3 rounded">
    <a href="<?php echo URL::to('/show-flight/'.request()->segment(count(request()->segments()))) ?>">Flight</a>
  </div><!-- end of function candidates_sections_heading_indiv -->

<div class="clearfix"></div>
</div><!-- end of function candidates_sections_heading_all-->

<style type="text/css">
  #menu_candidates{
    background-color: #0785C8;
    color: white;
  }
  
</style>