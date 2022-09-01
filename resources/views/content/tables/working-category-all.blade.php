@extends('layouts/contentNavbarLayout')

@section('title', 'Working Category')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Working Category
  
</h4>

<div id="above_table_info_area" class="mb-2">
  
  <div class="float-start_00 text-left" id="above_table_info_area_left">
    <span class="fw-bolder mb-4">Working Category </span>    
  </div>

  <!-- <div class="float-end">

      <div id="dashboard_add_candidates">
        <a  class="p-2 rounded fw-bolder" href="#">Add New Candidates</a>
      </div>    
  </div>

  <div class="clearfix"></div>
 -->
</div><!-- end of id above_table_info_area -->



<div class="row" id="latest_candidates_area">
  



</div><!-- end of id latest_candidates_area-->


<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered data-table">
        <thead>
          <tr>
            <th>SL</th>
            <th>CODE</th>
            <th>Name</th>
            <th>Email</th>
            <th>Passport No</th>
            <th>Organization Name</th>
            <th>Organization Category</th>
            
            <th>JOB DESCRITION</th>
            <th>STATUS</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody>
          
          
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

     

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        "scrollX": true,

        ajax: "{{ route('working-category-all') }}",

        columns: [

            

            // {data: 'id', name: 'id'},

            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },

            {data: 'user_code', name: 'Code'},

            {data: 'full_name', name: 'name'},

            {data: 'email', name: 'email'},
            {data: 'passport_num', name: 'passport_num'},
            {data: 'company', name:'company' },
            {data: 'organization_category', name: 'organization_category'},
            {data: 'job_designation', name: 'job_designation'},
            /*{data: 'nationality', name: 'nationality'},
            

            {data: 'company', name: 'company'},

            {data: 'country', name: 'country'},*/
            
            

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

      


    
  });

  
</script>

 
@endsection
