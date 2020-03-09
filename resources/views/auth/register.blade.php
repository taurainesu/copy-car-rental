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
                        <label class="headers">Personal Details</label>
                        <div class="ui divider"></div>
                        <div class="field">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Name" required>
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
                              <label>License Number</label>
                                <input type="text" name="licenseNo" placeholder="License ID Number" required>
                            </div>
                            </div>
                          <div class="two fields">
                            <div class="field">
                              <label>Gender</label>
                                <select name="sex" class="ui selection dropdown" required>
                                  <option>Female</option>
                                  <option>Male</option>
                                </select>
                            </div>
                            <div class="field">
                              <label>Age</label>
                              <input type="number" name="age" placeholder="Age" required>
                            </div>
                          </div>
                        
                          <div class="field">
                            <label>Physical Address</label>
                            <textarea rows="2" name="res_address"  placeholder="Residental Address" required></textarea>
                          </div>
                            
                  
                          <div class="two fields" style="margin-bottom:40px !important">
                            <div class="field">
                              <label>Country of Residence</label>
                                <select class="ui selection dropdown" name="country" required>
                                  <option>USA</option>
                                  <option>South Africa</option>
                                  <option>Zambia</option>
                                  <option>Mozambique</option>
                                  <option>Botswana</option>
                                  <option>Zimbabwe</option>
                                </select>
                            </div>
                            <div class="field">
                              <label>Nationality</label>
                              <input type="text" name="nationality" placeholder="Nationality" required>
                            </div>
                          </div>
                          <label class="headers">Account Information</label>
                          <div class="ui divider"></div>
                          <div class="two fields">
                            <div class="field">
                              <label>Email Address</label>
                                <input type="email" name="email" placeholder="Email Address" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                              <label>Phone Number</label>
                              <input type="number" name="phone" placeholder="Phone Number" required>
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                              <label>Password</label>
                                <input type="password" name="password" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                              <label>Confirm Password</label>
                              <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
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
