@extends('layouts.auth')
@section("content")
<div class="container">
  <div class="ui card p-5" style="width:45%;margin:auto;top:3rem;padding:1.5rem 1rem">
      <div class="content">
          <form method="POST" action="{{ route('login') }}" class="ui form">
              @csrf
              <p align="right" style="margin:0;padding:0"><a href="{{route('supplier-login')}}"><strong>Go to supplier login</strong> <i class="arrow right icon"></i></a></p>
              <img src="/logo.png" style="width:100px;height:50px"/>
              <h3 style="margin:20px 0">User Sign In</h3>
              @error('email')
              @if($facebook ?? false)
              <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                  Facebook authentication failed.
                </div>
                <p>Please try again.</p>
              </div>
              @else
              <div class="ui negative message">
                <i class="close icon"></i>
                <div class="header">
                  Authentication failed.
                </div>
              <p>{{$message}}</p>
              </div>
              @endif
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
              <button class="ui button orange login" style="margin:10px 0 10px 0;width:100%" onclick="showLoading()">Sign in with Cruiz Account</button>
          </form>
          <a href="{{ url('/login/facebook') }}">
            <button class="ui button blue facebook" onclick="showLoadingFb()" style="margin:0px 0 10px 0;width:100%">
              <i class="fa fa-facebook" style="margin-right:10px"></i> Sign in with Facebook
            </button>
          </a>
          <a href="{{ url('/reset/link') }}">
            <button class="ui button green" style="margin:0px 0 20px 0;width:100%">
               Forgot Password
            </button>
          </a>
          <p align="center">Not already a member?<a href="{{route('register')}}"><strong> Create a user account.</strong></a></p>
        </div>
  </div>

</div>
@endsection


