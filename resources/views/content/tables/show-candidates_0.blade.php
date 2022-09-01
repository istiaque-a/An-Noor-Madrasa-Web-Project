@extends('layouts/contentNavbarLayout')

@section('title', 'Show Candidates')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Candidates
  
</h4>



<div id="above_table_info_area" class="mb-2">
  
  <div class="float-start text-left" id="above_table_info_area_left">
    <span class="fw-bolder mb-4">Candidates</span>    
  </div>

  <div class="float-end">

      <div id="dashboard_add_candidates">
        <a  class="p-2 rounded fw-bolder" href="#">Add New Candidates</a>
      </div>    
  </div>

  <div class="clearfix"></div>

</div><!-- end of id above_table_info_area -->



<div class="row" id="latest_candidates_area">
  



</div><!-- end of id latest_candidates_area-->


<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SL</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Nationality</th>
            <th>Organization Category</th>
            <th>COMPANY NAME</th>
            <th>COUNTRY</th>
            <th>STATUS</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody>

          <?php
          $counter=0;

          foreach($users as $user){
            ++$counter;
            ?>

          <tr>
            <td>{{$counter}}</td>
            <td>123456</td>
            <!-- <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td> -->
            <td><a href="{{URL::to('/show/user/'.$user->id)}}">{{$user->first_name.' '.$user->last_name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->nationality}}</td>


            <td>
              {{$user->organization_category}}
            </td>
            <td>{{$user->company}}</td>
            <td>{{$user->country}}</td>
            <td>
              <span class="badge bg-label-primary me-1">Active</span>

              

            </td>
            
          </tr>

            <?php


          }// end of foreach loop


          ?>
          



          

          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--/ Bordered Table -->




@endsection

@section('vendor-script')

<script type="text/javascript">
  
  $(document).ready(function(){

    


  });
</script>

 
@endsection
