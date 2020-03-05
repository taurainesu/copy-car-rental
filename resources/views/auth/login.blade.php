@extends('layouts.auth')
@section('content')
<div class="ui card p-5" style="width:30%;margin:auto;top:8rem">
    <div class="content">
        <form style="text-align:center" method="POST" action="{{ route('login') }}">
            @csrf
            <img src="/logo.png" style="width:100px;height:50px"/>
            <h3 class="my-4">Sign In</h3>
            
            <div class="ui input mb-4">
                <input name="email" type="email" placeholder="Email">
            </div>
            <div class="ui input  mb-4">
                <input name="password" type="password" placeholder="Password">
            </div>
            <button class="ui button orange mb-3">Sign In</button>
            <p>Not already a member?<a href="{{route('register')}}"> Create Account</a></p>
        </form>
        
    </div>
</div>
@endsection

