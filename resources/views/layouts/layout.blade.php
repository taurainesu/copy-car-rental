<!DOCTYPE html>
<html>

  <head>
    <title>Cruiz Auto City</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Semantic-UI-Alert.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
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
      
      .input.selection{
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

      #app{
        display:flex;
        min-height: 100vh;
        flex-direction: column;
      }

      .site_content{
        flex: 1;
      }

      .ui.secondary.inverted.menu .active.item{
        background: none;
        font-weight: bold;
      }

      .ui.secondary.inverted.menu .item:hover{
        background: none !important;
        font-weight: bold !important;
        color: #cccccc;
      }

      .ui.secondary.inverted.menu .item{
        font-size: 16px;
      }

      .orange.button{
        background: #E6B015 !important;
      }

      

    </style>
  </head>


  

  <body>
    <div id="app">
      {{--Navigation Bar--}}
      <header>
          <div class="ui secondary menu inverted" style="background:#3E4B96;padding:20px" >
              <div class="ui container">
                  <div style="margin-right:20px"><img src="/logo.png" alt="Logo" height="50px" width="100px"></div>
                  <a class="item @if($home ?? false) active @endif" href="/">Home</a>
                  <a class="item @if($vehicles ?? false) active @endif" href="/cars">Vehicles</a>
                  <a class="item @if($register ?? false) active @endif" href="/cars/new">Register   Vehicle</a>
                  <a class="item @if($my_reservation ?? false) active @endif" href="/reservations">My Reservations</a>
                  <a class="item @if($admin ?? false) active @endif" href="/admin">Admin</a>
                  <div class="right menu">
                      <div class="item">
                          <div class="ui icon input" style="display: none">
                          <input type="text" placeholder="Search Vehicles">
                          <i class="search link icon"></i>
                          </div>
                      </div>
                      <form action="{{route("logout")}}" method="POST">
                          @csrf
                          <button type="submit" class="ui button inverted">Logout</button>
                      </form>
                  </div>
              </div>
          </div>
      </header>
      {{--Navigation Bar--}}

      <main class="site_content">

       
      
          @yield('content')
       

          <div class="ui tiny modal middle aligned " id="reservationmodal" style="display:none">
            <i class="close icon"></i>
                    <div class="header">Rent a @{{car.brand}} @{{car.model}}</div>
                    <div class="content">
                    <form form method="POST" action="{{route('new_reservation')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="ui two column centered grid">
                    <div class="column"><div class="ui input fluid ">
                    <input id="date_picker1" autocomplete="off" name="pick_up_date" placeholder="Start Date" type="text" @click="datepickers(car)" required>
                    </div></div>
                    <div class="column"><div class="ui input fluid">
                    <input id="date_picker2" name="return_date"placeholder="End Date"  autocomplete="off" required>
                    </div> </div>
                    </div>
          
                    <div class="ui divider"></div>
                    <h5>Payment method</h5>
                    
                <div class="inline fields">
   
                  <div class="field">
                  <div class="ui radio checkbox">
                    <input  id="ecoradio" type="radio" name="payment_method" value="ecocash">
        <label>Ecocash</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input id="oneradio" type="radio" name="payment_method" value="onemoney">
        <label>One Money</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input  id="otherradio" type="radio" name="payment_method" value="other">
        <label>Other Methods</label>
      </div>
    </div>
   
  </div>

                    
          
                    <div class="ui divider"></div>
                    <div class="ui two column  grid">
                    <h5 id="attribute">Daily rate $    </h5> <strong id="total_price"> @{{car.daily_rate}}</strong>
                    </div>
          
          </br>
          
                      <input type="hidden" id="custId" name="car_id" :value='car.id'>
          
                      {{-- @if ($reservation)
                      <input type="hidden" id="custId" name="reservation_id" value=@{{ $reservation->id }}>
                       @endif --}}



                       
                    
                
                      
              
          
          
          <div id="mobile_money" class="ui input" style="display: none;">
          <label>Phone Number</label>
                  <input type="text" name="phone_number" value=""></input>
              </div>
              <div class="ui divider"></div>
              
                    <button type="submit" class="orange ui compact inverted button">RESERVE</button>  
          
                    </form> 
                        </div>
          
                    </div>




                    
      </main>

      {{-- footer --}}
      <div class="ui inverted vertical footer segment" style="padding:50px 0;background:#3E4B96;">
          <div class="ui container">
              <div class="ui stackable inverted divided equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">About US</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">Cruiz Auto City</a>
                    <a href="#" class="item">How it Works</a>
                    <a href="#" class="item">FAQ</a>
                
                    </div>
                </div>
                <div class="four wide column">
                  <h4 class="ui inverted header">Social Media</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">Whatsapp</a>
                    <a href="#" class="item">Facebook</a>
                    <a href="#" class="item">Twitter</a>
                    <a href="#" class="item">Instagram</a>
                    </div>
                </div>

                <div class="four wide column">
                  <h4 class="ui inverted header">Visit Us</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">
                      40667 Cleveland Ave<br/>
                      Milton Park<br/>
                      Harare</a>
                    </div>
                </div>

                <div class="four wide column">
                  <h4 class="ui inverted header">Contact Us</h4>
                    <div class="ui inverted link list">
                    <a href="#" class="item">Email us - sales@cruizautocity.com</a><br/>
                    <a href="#" class="item">Phone Number(s)<br/>
                      +263 739 677 357<br/>
                      +263 719 902 809</a>
                    </div>
                </div>
                
              </div>

          </div>
      </div>
      {{-- footer --}}
    </div>

  </body>
  
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/semantic.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('js/Semantic-UI-Alert.js') }}"></script>
 
  <script>
    $(document).ready(function() {
      $("#ecoradio").click(function() {
       $("#mobile_money").hide();
       
        $("#mobile_money").show();
        
    });

      $("#otherradio").click(function() {
        $("#mobile_money").hide();
      
    });

    $("#oneradio").click(function() {
        $("#mobile_money").hide();
        $("#mobile_money").show();
    });


        $('.ui.dropdown')
          .dropdown({on: 'click'
          })
        ;
      })
    ;

    $('.special.cards .image').dimmer({
      on: 'hover'
    });



    @if (session('status'))



    $(document).ready(function() {
$.uiAlert({
textHead: 'cant connect to paynow server', // header
text: 'please check yor internet connection', // Text
bgcolor: '#F2711C', // background-color
textcolor: '#fff', // color
position: 'top-right',// position . top And bottom ||  left / center / right
icon: 'warning sign', // icon in semantic-UI
time: 3, // time
  })
});
       
    @endif

@if (session('reservation_status'))



$(document).ready(function() {
$.uiAlert({
textHead: 'Vehicle is reserved in this period', // header
text: 'please choose another vehicle or period', // Text
bgcolor: '#F2711C', // background-color
textcolor: '#fff', // color
position: 'top-right',// position . top And bottom ||  left / center / right
icon: 'warning sign', // icon in semantic-UI
time: 3, // time
})
});
   
@endif



   


    </script>





  @yield('javascript')
  

</html>
