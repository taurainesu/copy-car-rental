@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="ui card p-5" style="width:30%;margin:auto;top:6rem;padding:40px">
        <div class="content">
            <div class="ui form">
                @csrf
                <img src="/logo.png" style="width:100px;height:50px"/>
                <h3 style="margin:20px 0">Send Password Link</h3>
                @error('email')
                      <p class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </p>
                  @enderror
                  <div id="form">
                    <div class="field @error('email') error @enderror">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Email Address" >
                      </div>
                      <p>NB. Use the email address you registered with.</p>
                      <button class="ui button orange login" style="margin:10px 0 20px 0" onclick="showLoading()">Send Link</button>
                  </div>
                </div>
            <a href="/login">
                <button class="ui button blue login" style="margin:0px">Login</button></a>
          </div>
    </div>
  
  </div>
@endsection
@section("js")
<script>
    $.ajax({
        url: '/send/link',
        type: 'post',
        data: {
          'email':email
        },
        headers: {
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') //for object property name, use quoted notation shown in second
        },
        dataType: 'json',
        success: function (data) {
          //JSON.stringify(data);
            if(data.message){
              //show success notification
            }

            else{
              //show failure notification
            }
        }
    });
</script>
@endsection
