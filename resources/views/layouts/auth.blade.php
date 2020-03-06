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
        <main>
          @yield("content")
        </main>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script>
  $(document)
      .ready(function() {
        $('.ui.dropdown')
          .dropdown({
            on: 'click'
          })
        ;
      })
    ;
</script>
</html>