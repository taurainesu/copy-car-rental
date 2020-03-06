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
                          
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <input type="text" name="" placeholder="National ID Number">
                            </div>
                            <div class="field">
                                <input type="text" name="licenseNo" placeholder="License ID Number">
                            </div>
                            </div>
                          <div class="two fields">
                            <div class="field">
                                <div class="ui fluid search selection dropdown" id="sex_div">
                                    <input class="search" hidden name="sex" id="sex">
                                    <i class="dropdown icon"></i>
                                    <span class="text">Gender</span>
                                    <div class="menu" tabindex="-1">
                                      <div class="item" data-value="Female">Female</div>
                                      <div class="item" data-value="Male">Male</div>
                                    </div>
                                  </div>
                            </div>
                            <div class="field">
                              <input type="number" name="age" placeholder="Age">
                            </div>
                          </div>
                          <div class="field">
                            <div class="field">
                              <input type="text" name="address" placeholder="Residental Address">
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                                <div class="ui fluid search selection dropdown" id="country_div">
                                    <input class="search" hidden name="country" id="country">
                                    <i class="dropdown icon"></i>
                                    <span class="text">Country of Residence</span>
                                    <div class="menu" tabindex="-1">
                                        <div class="item" data-value="USA">USA</div>
                                        <div class="item" data-value="South Africa">South Africa</div>
                                        <div class="item" data-value="Zambia">Zambia</div>
                                        <div class="item" data-value="Mozambique">Mozambique</div>
                                        <div class="item" data-value="Botswana">Botswana</div>
                                        <div class="item" data-value="Zimbabwe">Zimbabwe</div>
                                    </div>
                                  </div>
                            </div>
                            <div class="field">
                              <input type="text" name="nationality" placeholder="Nationality">
                            </div>
                          </div>
                          <label style="margin:30px 0 20px 0;text-align:left">Account Information</label>
                          <div class="two fields">
                            <div class="field">
                                <input type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="field">
                              <input type="number" name="phone" placeholder="Phone Number">
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                                <input type="password" name="password" placeholder="Password">
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
