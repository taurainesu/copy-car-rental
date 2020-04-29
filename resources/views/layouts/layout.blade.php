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
        font-size: 14px;
      }
      .orange.button{
        background: #E6B015 !important;
      }

      #reservation_form p,#reservation_form h4{
          font-size: 13px !important;
      }
      
    </style>
  </head>


  

  <body>
    <div id="app">
      {{--Navigation Bar--}}
      <header>
          <div class="ui secondary menu inverted" style="background:#3E4B96;padding:15px" >
              <div class="ui container">
                  <div style="margin-right:20px">
                    <a href="/">
                      <img src="/logo.png" alt="Logo" height="50px" width="100px">
                    </a>
                  </div>
                  <a class="item @if($home ?? false) active @endif" href="/">Home</a>
                  <a class="item @if($vehicles ?? false) active @endif" href="/cars">Vehicles</a>
                  <a class="item @if($register ?? false) active @endif" href="/cars/new" style="display:none">Register   Vehicle</a>
                  <a class="item @if($my_reservation ?? false) active @endif" href="/reservations">My Reservations</a>
                  <a class="item @if($admin ?? false) active @endif" href="/admin">Admin</a>
                  <div class="right menu">
                      <div class="item">
                          <div class="ui icon input" style="display: none">
                          <input type="text" placeholder="Search Vehicles">
                          <i class="search link icon"></i>
                          </div>
                      </div>
                      @if(Auth::user()->isSupplier)
                      <div class="item">
                        <a href="/supplier/home" class="ui button inverted" style="margin-left:10px">Go to Supplier Page</a>
                      </div>
                      @else
                      <div class="item">
                        <a href="/cars/new" class="ui button inverted" style="margin-left:10px">Become A Supplier</a>
                      </div>
                      @endif
                      <form class="ui item" action="{{route("logout")}}" method="POST">
                          @csrf
                          <button type="submit" class="ui button inverted" style="width:150px">Logout</button>
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
                <form form class="ui form" id="reservation_form" method="POST" action="{{route('new_reservation')}}" enctype="multipart/form-data" >
                @csrf
                    <div class="field">
                      <label style="margin-bottom:10px !important">Reservation Dates</label>
                      <div class="ui two column centered grid">
                          <div class="column">
                              <div class="ui input fluid ">
                                  <input id="date_picker1" autocomplete="off" name="pick_up_date" placeholder="Start Date" type="text" @click="datepickers(car)" required>
                              </div>
                          </div>
                          <div class="column">
                              <div class="ui input fluid">
                                  <input id="date_picker2" name="return_date"placeholder="End Date"  autocomplete="off" required>
                              </div> 
                          </div>
                      </div>
                    </div>

                    <div class="field" id="extra_kms" v-if="car.type == 'Tow Truck'">
                      <label style="margin-bottom:10px !important">Tow Truck kms i.e if distance above 30km</label>
                      <div class="ui input">
                        <input type="number" placeholder="Kilometres" v-model="tow_kms"></input>
                    </div>
                    </div>

                    <div class="field">
                      <label style="margin-bottom:10px !important">Choose currency</label>
                      <select class="ui fluid dropdown currency" id="currency" name="currency" required>
                        <option value="USD">USD</option>
                        <option value="Rand">Rand</option>
                        <option value="ZWL">ZWL</option>
                      </select>
                    </div>
      
                    
                    <div class="field">
                      <label style="margin-bottom:10px !important">Payment Method</label>
                      <select class="ui fluid dropdown payment_method" name="payment_method" required>
                        <option value="Ecocash">Ecocash</option>
                        <option value="OneMoney">OneMoney</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>

                    <div class="field" id="mobile_money">
                      <label style="margin-bottom:10px !important">Phone Number</label>
                      <div class="ui input">
                        <input type="text" name="phone_number" placeholder="eg 0771234567" value=""></input>
                    </div>
                    </div>

                    <div class="field">
                      <label style="margin-top:10px !important">Summary</label>
                      <div class="ui divider"></div>
                      <div class="ui two column grid" style="margin-bottom:-2rem">
                        <div class="column ten wide">
                          <p>Daily Rate</p>
                        </div>
                        <div class="column six wide" style="text-align:end">
                        <p id="rate">@{{this.$root.current_currency + this.$root.co_daily_rate}}</p>
                        </div>
                      </div>
                      <div class="ui two column grid">
                        <div class="column ten wide">
                          <p>Number of Days</p>
                        </div>
                        <div class="column six wide" style="text-align:end">
                          <p id="no_of_days">x  @{{this.$root.num_days}} days</p>
                        </div>
                      </div>
                      <div class="ui divider"></div>
                      <div class="ui two column grid">
                          <div class="column ten wide">
                            <h4>Total Amount</h4>
                          </div>
                          <div class="column six wide" style="text-align:end">
                            <h4 id="total_price">@{{this.$root.totalAmount}}</h4>
                          </div>
                      </div>
                    </div>
        
                    <input type="hidden" id="custId" name="car_id" :value='car.id'>

                    <input type="hidden" name="amount" :value='this.$root.total'>

                    <div class="ui divider"></div>

                    <div class="inline field">
                      <div class="ui checkbox">
                        <input type="checkbox" id="terms" required>
                        <label>I agree to the terms and conditions</label>
                      </div>
                    </div>
        
                    <div class="ui divider"></div>
        
                    <button type="submit" @click="submitTheForm()" class="ui compact button orange large" id="submit_reservation" style="width:100%">Reserve</button>  
        
                </form> 
            </div>
        </div>

        <div class="ui  mini modal" id="loading_payment" style="height:200px" hidden>
          <div class="ui active dimmer">
            <div class="ui indeterminate text loader">Processing your reservation and payment...Please Wait</div>
          </div>
        </div>
                    
      </main>

      {{-- footer --}}
      <div class="ui inverted vertical footer segment" style="padding:25px 0;background:#3E4B96;">
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
@if (session('vehicle_status'))
$(document).ready(function() {
$.uiAlert({
textHead: 'Vehicle is already in sysytem', // header
text: 'If you didnt register your Vehicle please get in touch with us ', // Text
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