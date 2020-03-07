@extends('layouts.auth')
@section('content')
<div class="container">
    <div class="column">
        <div class="ui card" style="padding:40px;width:45%;margin:3rem auto">
            <div class="content">
                <form method="POST" action="{{ route('register') }}" class="ui form" style="text-align:center">
                    <img src="/logo.png" style="width:100px;height:50px;"/>
                    <h3 style="margin:20px auto">Registration</h3>
                    @csrf
                    <div class="field">
                        <label style="margin:0 0 20px 0;text-align:left">Personal Details</label>
                        <div class="field">
                          
                            <input type="text" name="name" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          
                        </div>
                        <div class="field">
                            <div class="field">
                                <input type="text" style="display:none" name="" placeholder="National ID Number">
                            </div>
                            <div class="field">
                                <input type="text" name="licenseNo" placeholder="License ID Number">
                            </div>
                            </div>
                          <div class="two fields">
                            <div class="field">
                                <select name="sex" class="ui selection dropdown">
                                  <option>Female</option>
                                  <option>Male</option>
                                </select>
                            </div>
                            <div class="field">
                              <input type="number" name="age" placeholder="Age">
                            </div>
                          </div>
                         
                            <div class="field">
                              <input type="text" name="address" placeholder="Residental Address" value="">
                            </div>
                  
                          <div class="two fields">
                            <div class="field">
                                <select class="ui selection dropdown" name="country">
                                  <option>USA</option>
                                  <option>South Africa</option>
                                  <option>Zambia</option>
                                  <option>Mozambique</option>
                                  <option>Botswana</option>
                                  <option>Zimbabwe</option>
                                </select>
                            </div>
                            <div class="field">
                              <input type="text" name="nationality" placeholder="Nationality">
                            </div>
                          </div>
                          <label style="margin:30px 0 20px 0;text-align:left">Account Information</label>
                          <div class="two fields">
                            <div class="field">
                                <input type="email" name="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                              <input type="number" name="phone" placeholder="Phone Number">
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                                <input type="password" name="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                              <input type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                          </div>
                    </div>
                    <button class="ui button orange" style="margin:20px 0">
                        Register
                    </button>
                    <p style="margin:auto;text-align:center">Already a member?<a href="/login">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section("javasript")
<script>
  $(".button").click(function(){

    $("#sex").val($("#sex_div").dropdown("get value"));
    $("#country").val($("#country_div").dropdown("get value"));

    console.log( $("#sex").val());
    console.log( $("#country").val());
  })
  
</script>
@endsection
