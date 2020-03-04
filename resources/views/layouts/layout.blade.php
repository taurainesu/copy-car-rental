<!DOCTYPE html>
<html>

  <head>
    <title>Car Rental</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
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
    </style>
  </head>

  <body>
    <div id="app">
      {{--Navigation Bar--}}
      <header>
          <div class="ui secondary menu inverted" style="background:#1b1c1d;padding:20px" >
              <div class="ui container">
                  <a class="active item" href="/">Home</a>
                  <a class="item" href="/cars">Vehicles</a>
                  <a class="item" href="/vehicle/register" style="display:none">Register   Vehicle</a>
                  <a class="item">My Reservations</a>
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

      <main>
          @yield('content')
      </main>

      {{-- footer --}}
      <div class="ui inverted vertical footer segment p-4">
          <div class="ui container">
              <div class="ui stackable inverted divided equal height stackable grid">
              <div class="three wide column">
                  <h4 class="ui inverted header">About</h4>
                  <div class="ui inverted link list">
                  <a href="#" class="item">Sitemap</a>
                  <a href="#" class="item">Contact Us</a>
                  <a href="#" class="item">Religious Ceremonies</a>
                  <a href="#" class="item">Gazebo Plans</a>
                  </div>
              </div>
              <div class="three wide column">
                  <h4 class="ui inverted header">Services</h4>
                  <div class="ui inverted link list">
                  <a href="#" class="item">Banana Pre-Order</a>
                  <a href="#" class="item">DNA FAQ</a>
                  <a href="#" class="item">How To Access</a>
                  <a href="#" class="item">Favorite X-Men</a>
                  </div>
              </div>
              <div class="seven wide column">
                  <h4 class="ui inverted header">Footer Header</h4>
                  <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
              </div>
              </div>
=======
<head>
	<title>
	Car Rental

	</title>
<link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}">
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




</style>
	

</head>
<body>


	    



	
	<header>

		<div class="ui secondary menu inverted" style="background:#000000;padding:10px" >

			<div class="ui container">
			<a class="active item" href="/">Home</a>
				<a class="item" href="/cars">Vehicles</a>
  				<a class="item" href="/vehicle/register" style="display:none">Register   Vehicle</a>
  				<a class="item">My Reservations</a>
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



	    			<main>
              @yield('content')
            </main>
	    			

</body>


<div class="ui">


 		<footer style="display:none">
		<div class="ui divider"></div>

 <div class="ui two column centered grid">
        <div class="column">
<a href="google.com"><i class=" big facebook square link icon" href="goodle.com"></i>Like us</a>
<a href='https://wa.me/263739677357'><i class=" green big whatsapp square link icon"></i>Chat</a>


         </div>
        <div class="four column centered row">
        	<div class="column"><p>sales@cruizautocity.com</p>
        		<p>+263 739 677 357</p>
        		 <p>+263 719 902 809</p></div>
          <div class="column"><i class="red map marker alternate link icon"></i><p>Harare CBD</p></div>
          
        </div>
      </div>

		
	</footer>

	<div class="ui inverted vertical footer segment" style="margin-top:40px;padding:20px">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui inverted header">Address</h4>
          
          <p>Harare CBD</p>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Get in touch</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Banana Pre-Order</a>
            <a href="#" class="item">DNA FAQ</a>
            <a href="#" class="item">How To Access</a>
            <a href="#" class="item">Favorite X-Men</a>
          </div>
      </div>
      {{-- footer --}}
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

    $('.special.cards .image').dimmer({
      on: 'hover'
    });
    </script>

  @yield('javascript')

</html>
