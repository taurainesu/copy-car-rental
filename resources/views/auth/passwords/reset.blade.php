@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="ui card p-5" style="width:30%;margin:auto;top:2rem;padding:40px">
        <div class="content">
            <form style="text-align:center" method="POST" action="{{ route('resetPassword') }}" class="ui form">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? '' }}">

                <img src="/logo.png" style="width:100px;height:50px"/>
                <h3 style="margin:20px 0">Reset Password</h3>
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
                <div class="field @error('password') error @enderror">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <button class="ui button orange login" style="margin:10px 0 20px 0" onclick="showLoading()">Change Password</button>
            </form>
            <a href="/login">
              <button class="ui button blue" style="margin:0px">Go to Login</button></a>
          </div>
    </div>
  
  </div>
@endsection
