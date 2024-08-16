@extends('layouts/contentNavbarLayout')

@section('title', 'Smart Card')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   Smart Card
  
</h4>

<div id="above_table_info_area" class="mb-2">
  
  <div class="float-start_00 text-left" id="above_table_info_area_left">
    <span class="fw-bolder mb-4">Smart Card </span>    
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
           <table class="table table-bordered table-responsive data-table">

        <thead>

            <tr>

                <th>SL</th>
                <th>Code</th>

                <th>Name</th>

                <th>Email</th>
                <th>Nationality</th>
                <th>Organization Category</th>
                <th>Company Name</th>
                <th>Country</th>

                <th width="100px">Status</th>

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

        ajax: "{{ route('smart-card-all') }}",

        columns: [

            

            // {data: 'id', name: 'id'},

            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },

            {data: 'user_code', name: 'id'},

            {data: 'full_name', name: 'name'},

            {data: 'email', name: 'email'},

            {data: 'nationality_found', name: 'nationality'},
            {data: 'organization_category', name: 'organization_category'},

            {data: 'company_found', name: 'company'},

            {data: 'country_found', name: 'country'},
            
            

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

      


    
  });

  
</script>

 
@endsection
