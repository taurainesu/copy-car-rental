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
                        <div class="two fields">
                          <div class="field">
                            <input type="text" name="shipping[first-name]" placeholder="First Name">
                          </div>
                          <div class="field">
                            <input type="text" name="shipping[last-name]" placeholder="Last Name">
                          </div>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <input type="text" name="shipping[first-name]" placeholder="National ID Number">
                            </div>
                            <div class="field">
                                <input type="text" name="shipping[last-name]" placeholder="License Number">
                            </div>
                            </div>
                          <div class="two fields">
                            <div class="field">
                                <div class="ui fluid search selection dropdown">
                                    <input class="search" hidden name="location">
                                    <i class="dropdown icon"></i>
                                    <span class="text">Gender</span>
                                    <div class="menu" tabindex="-1">
                                      <div class="item" data-value="Harare">Female</div>
                                      <div class="item" data-value="Bulawayo">Male</div>
                                    </div>
                                  </div>
                            </div>
                            <div class="field">
                              <input type="number" name="shipping[last-name]" placeholder="Age">
                            </div>
                          </div>
                          <div class="field">
                            <div class="field">
                              <input type="text" name="shipping[first-name]" placeholder="Residental Address">
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                                <div class="ui fluid search selection dropdown">
                                    <input class="search" hidden name="country">
                                    <i class="dropdown icon"></i>
                                    <span class="text">Country of Residence</span>
                                    <div class="menu" tabindex="-1">
                                        <div class="item" data-value="af">USA</div>
                                        <div class="item" data-value="af">South Africa</div>
                                        <div class="item" data-value="af">Zambia</div>
                                        <div class="item" data-value="af">Mozambique</div>
                                        <div class="item" data-value="af">Botswana</div>
                                        <div class="item" data-value="af">Zimbabwe</div>
                                    </div>
                                  </div>
                            </div>
                            <div class="field">
                              <input type="number" name="shipping[last-name]" placeholder="Nationality">
                            </div>
                          </div>
                          <label style="margin:30px 0 20px 0;text-align:left">Account Information</label>
                          <div class="two fields">
                            <div class="field">
                                <input type="email" name="shipping[last-name]" placeholder="Email Address">
                            </div>
                            <div class="field">
                              <input type="number" name="shipping[last-name]" placeholder="Phone Number">
                            </div>
                          </div>
                          <div class="two fields">
                            <div class="field">
                                <input type="password" name="shipping[last-name]" placeholder="Password">
                            </div>
                            <div class="field">
                              <input type="password" name="shipping[last-name]" placeholder="Confirm Password">
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
