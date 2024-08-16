@extends('layouts/contentNavbarLayout')

@section('title', 'All Agents')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Home -></span>
   All Agents
  
</h4>

<div id="above_table_info_area" class="mb-2">
  
  <div class="float-start_00 text-left" id="above_table_info_area_left">
    <span class="fw-bolder mb-4">All Agents </span>    
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
                <th>Name</th>

                
                <th>Mobile</th>
                
<!--                 <th width="100px">Status</th>

-->
                <th>Action</th>
 
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

        ajax: "{{ route('agent-all') }}",

        columns: [

            

            

            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },


            {data: 'full_name', name: 'name'},

            

            {data: 'phone', name: 'Mobile'},

            

/*            {data: 'status', name: 'status', orderable: false, searchable: false},
*/
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

      


    
  });
</script>

 
@endsection
