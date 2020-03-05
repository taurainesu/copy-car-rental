@extends('layouts.auth')

@section('content')
<div class="ui card p-5" style="width:45%;margin:1rem auto;">
    <div class="content">
        <form style="text-align:center" method="POST" action="{{ route('register') }}">
            @csrf
            <img src="/logo.png" style="width:100px;height:50px"/>
            <h3 style="margin:20px 0">Registration Details</h3>
            <div class="column ui two grid">
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="name" type="name" placeholder="Name">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="license" type="text" placeholder="Valid License No.">
                    </div>
                </div>    
            </div>

            <div class="column ui two grid">
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="email" type="email" placeholder="Email Address">
                    </div>
                </div> 
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="phone" type="text" placeholder="Phone Number">
                    </div>
                </div>    
            </div>

            <div class="column ui two grid">
                <div class="column ten wide">
                    <div class="ui input mb-0">
                        <input name="sex" type="text" placeholder="Gender">
                    </div>
                </div>
                <div class="column six wide">
                    <div class="ui input mb-0">
                        <input name="age" type="number" placeholder="Age">
                    </div>
                </div>    
            </div>

            <div class="column ui grid">
                <div class="column sixteen wide">
                    <div class="ui input mb-0">
                        <input type="email" placeholder="Email Address">
                    </div>
                </div>   
            </div>

            <div class="column ui grid">
                <div class="column sixteen wide">
                    <div class="ui input mb-0">
                        <input name="address" type="text" placeholder="Residential Address">
                    </div>
                </div>   
            </div>

            <div class="column ui two grid">
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="country" type="text" placeholder="Country of Residence">
                    </div>
                </div>
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="nationality" type="text" placeholder="Nationality">
                    </div>
                </div>    
            </div>

            <div class="column ui two grid">
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="password" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="column eight wide">
                    <div class="ui input mb-0">
                        <input name="password-confirm" type="password" placeholder="Confirm Password">
                    </div>
                </div>    
            </div>

            <button class="ui button orange  mb-3 mt-4">Sign Up</button>
            <p>Already a member?<a href="{{route('login')}}"> Log In</a></p>
        </form>
        
    </div>
</div>
@endsection
