@extends('layouts/contentNavbarLayout')

@section('title', 'Medical Formalities')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Medical Formalities
  
</h4>

<div id="above_table_info_area" class="mb-2">
  
  <div class="float-start_00 text-left" id="above_table_info_area_left">
    <span class="fw-bolder mb-4">Medical Formalities </span>    
  </div>


</div><!-- end of id above_table_info_area -->



<div class="row" id="latest_candidates_area">
  



</div><!-- end of id latest_candidates_area-->


<!-- Bordered Table -->
<div class="card">
  <!-- <h5 class="card-header">Bordered Table</h5> -->
  <div class="card-body">
    <div class="table-responsive text-nowrap">
     <table class="table table-bordered table-responsive data-table">

        <thead>

            <tr>

                <th>SL</th>
                <th>CODE</th>

                <th>Name</th>

                <th>Email</th>
                <th>Passport No</th>
                <th>Medical Center </th>
                <th>Medical Date </th>
<!--                 <th>Nationality</th>
                <th>Organization Category</th>
                <th>Company Name</th>
                <th>Country</th>
 -->
                <th width="100px">Status</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

    </div>
<!--/ Bordered Table -->

  </div>
</div>




@endsection

@section('vendor-script')


  
<script type="text/javascript">
  
  $(document).ready(function(){

     

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        "scrollX": true,

        ajax: "{{ route('medical-formalities-all') }}",

        columns: [

            

            // {data: 'id', name: 'id'},

            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },

            {data: 'user_code', name: 'CODE'},

            {data: 'full_name', name: 'name'},

            {data: 'email', name: 'email'},
            {data: 'passport_num', name: 'passport_num'},
            {data: 'medical_center', name:'medical_center' },
            {data: 'medical_date' , name: 'medical_date' },

            /*{data: 'nationality', name: 'nationality'},
            {data: 'organization_category', name: 'organization_category'},

            {data: 'company', name: 'company'},

            {data: 'country', name: 'country'},*/
            
            

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

      


    
  });

  
</script>

 
@endsection
