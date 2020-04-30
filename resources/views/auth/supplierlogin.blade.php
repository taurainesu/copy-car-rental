@extends('layouts.auth')
@section("content")
<div class="container">
  <div class="ui card p-5" style="width:35%;margin:auto;top:3rem;padding:30px">
      <div class="content">
          <form method="POST" action="{{ route('supplier-login') }}" class="ui form">
              @csrf
              <p align="right" style="margin:0;padding:0"><a href="/login"><i class="arrow left icon"></i> <strong>Go back to user login</strong></a></p>
              <img src="/logo.png" style="width:100px;height:50px"/>
              <h3 style="margin:20px 0">Supplier Sign In</h3>
              @error('email')
                    <p class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
              <div class="field @error('email') error @enderror">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Email Address" >
              </div>
              <div class="field @error('password') error @enderror">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="ui button orange login" style="margin:10px 0 10px 0" onclick="showLoading()">Sign in with Cruiz Account</button>
          </form>
          <a href="{{ url('/login/facebook') }}">
            <button class="ui button blue facebook" onclick="showLoadingFb()" style="margin:0px 0 10px 0;display:none">
              <i class="fa fa-facebook" style="margin-right:10px"></i> Sign in with Facebook
            </button>
          </a>
          <a href="{{ url('/reset/link') }}">
            <button class="ui button green" style="margin:0px 0 20px 0">
               Forgot Password
            </button>
          </a>
          <p align="center">Not already a supplier?<a href="{{route('supplier-register')}}"> <strong> Create a supplier account.</strong></a></p>
        </div>
  </div>

</div>
@endsection


