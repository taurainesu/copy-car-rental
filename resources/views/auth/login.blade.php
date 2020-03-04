<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CarHire Web Portal') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">

    <style type="text/css">
        body,a,h1,h2,h3,h4,.header,p,button,input,.search{
          font-family: "Montserrat",sans-serif !important;
        }
        
        .fas{
          font-size: 20px !important;
        }
        .more{
          margin:auto 0px !important; 
        }
        
        .input,.button{
          margin:0 0 35px 0;
          width: 100%;
        }
        
        .menu.transition{
          width: 100% !important;
        }
        
        .button.search{
          background: #fff;
          border:1px solid rgba(34,36,38,.15);
        }
        
        .button.search:hover{
          background: #fff;
          border:1px solid #cccccc;
        }
    </style>

</head>
<body>
    <div id="app">
        <div class="column">
            <div class="ui card p-5" style="width:30%;margin:auto;top:8rem">
                <div class="content">
                    <form style="text-align:center" method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="/logo.png" style="width:100px;height:50px"/>
                        <h3 style="margin:20px 0">Sign In</h3>
                       
                        <div class="ui input mb-4">
                            <input name="email" type="email" placeholder="Email">
                        </div>
                        <div class="ui input  mb-4">
                            <input name="password" type="password" placeholder="Password">
                        </div>
                        <button class="ui button orange  mb-3">Sign In</button>
                        <p>Not already a member?<a href="{{route('register')}}"> Create Account</a></p>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>
