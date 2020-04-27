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
                        <input id="email" type="email" name="email" placeholder="Email Address" required>
                      </div>
                      <p>NB. Use the email address you registered with.</p>
                      <button class="ui button orange login" style="margin:10px 0 20px 0" onclick="sendLink()">Send Link</button>
                  </div>

                  <div id="notification" style="margin-bottom:20px;display:none">
                    <div class="ui message">
                        <i class="close icon"></i>
                        <div class="header">
                          Notification
                        </div>
                        <p id="message">If email is found a reset link will be sent to <b>mkunadavy@gmail.com</b>. Check your mailbox.</p>
                      </div>
                  </div>
                </div>
            <a href="/login">
                <button class="ui button blue" style="margin:0px">Go to Login</button></a>
          </div>
    </div>
  
  </div>
@endsection
@section("js")
<script>
    function sendLink(){
        if($("#email").val() != null){
            $.ajax({
                url: '/send/link',
                type: 'post',
                data: {
                'email':$("#email").val()
                },
                headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') //for object property name, use quoted notation shown in second
                },
                dataType: 'json',
                success: function (data) {
                //show notification
                $("#form").hide();
                $("#notification").show();
                }
            });
        }
    }
</script>
@endsection
