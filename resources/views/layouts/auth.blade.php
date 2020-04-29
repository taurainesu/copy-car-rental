<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cruiz Auto City</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">

    <style type="text/css">
        body,a,h1,h2,h3,h4,.header,p,button,input,.search,textarea{
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

        .invalid-feedback{
          color: red;
          margin:0 0 10px 0 !important;
          padding: 0;
          font-size: 12px;
        }

        label.headers{
          font-size:20px !important;
          margin:20px 0 !important;
        
        }

          label{
          margin-bottom:20px;
          text-align:left !important;
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


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1149346202084642',
      cookie     : true,
      xfbml      : true,
      version    : 'v6.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>

<script>
  function showLoading(){
    $(".login").attr("class","ui button orange login loading");
  }  

  function showLoadingFb(){
    $(".facebook").attr("class","ui button blue facebook loading");
  }

  function showLoadingRegister(){
    $(".register").attr("class","ui button orange register loading");
  }

  $('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;
</script>

@yield('js')

</html>