@extends('layouts.auth')
@section("content")
<div class="container">
  <div class="ui card p-5" style="width:30%;margin:auto;top:2rem;padding:40px">
      <div class="content">
          <form method="POST" action="{{ route('login') }}" class="ui form">
              @csrf
              <img src="/logo.png" style="width:100px;height:50px"/>
              <h3 style="margin:20px 0">Sign In</h3>
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
            <button class="ui button blue" style="margin:0px 0 10px 0">
              <i class="fa fa-facebook" style="margin-right:10px"></i> Sign in with Facebook
            </button>
          </a>
          <a href="{{ url('/reset/link') }}">
            <button class="ui button green" style="margin:0px 0 20px 0">
               Forgot Password
            </button>
          </a>
          <p>Not already a member?<a href="{{route('register')}}"> Create Account</a></p>
        </div>
  </div>

</div>
@endsection


