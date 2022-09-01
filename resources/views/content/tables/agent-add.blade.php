@extends('layouts/contentNavbarLayout')

@section('title', 'Add Agents - Admin')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection



@section('content')

<div class="container-xxl">
  <div class="authentication-wrapper_0000 authentication-basic container-p-y" id="agent_add_wrapper">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <div class="text-center"><h4 class="fw-bold py-3">Add Agents</h4></div>
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <!-- <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span> -->
              <!-- <span class="app-brand-logo demo"><img src="{{URL::to('/assets/img/logo.png')}}" alt="logo" /></span> -->
              <!-- <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span> -->
            </a>
          </div>
          <!-- /Logo -->
          <!-- <h4 class="mb-2">Adventure starts here 🚀</h4>
          <p class="mb-4">Make your app management easy and fun!</p> -->
          <div class="text-success text-center">
          @if (session('message')) 
                {{ session('message') }} 
          @endif
          </div>

          <form id="formAuthentication" class="mb-3" action="{{route('register')}}" method="POST">

            
                        @csrf


            <div class="mb-3">
              <label for="first_name" class="form-label">First Name</label>
              <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
               -->

               <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>




            <div class="mb-3">
              <label for="middle_name" class="form-label">Middle Name</label>
              <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
               -->

               <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}"  autocomplete="middle_name" placeholder="Middle Name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>



            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name</label>
              <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
               -->

               <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>


            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <!-- <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"> -->


            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            </div>

            <div class="mb-3">
              <label for="mobile" class="form-label">Mobile</label>
              <!-- <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"> -->


            <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" placeholder="Mobile Number">

            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            </div>

            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                
                <!-- <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                 -->

               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>




            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Confirm Password</label>
              <div class="input-group input-group-merge">
                
                <!-- <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                 -->

               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>









<!-- 
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div> -->
            
            <button type="submit" id="btn_signup" class="btn btn-primary d-grid w-100">
              {{ __('Register') }}
            </button>

            

          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <!-- <a href="{{url('auth/login-basic')}}"> -->

            <a href="{{url('login')}}">
              <span>Sign in instead</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
</div>



@endsection
