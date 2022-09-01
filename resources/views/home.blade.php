@extends('layouts/contentNavbarLayout')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                    <h3 class="text-success fw-semibold">
                
                     Welcome <?php 
                      echo request()->user()->first_name.' '.request()->user()->middle_name.' '.request()->user()->last_name.'.'; 
                    ?>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    </h3>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
