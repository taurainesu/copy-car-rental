<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CarHire Web Portal') }}</title>
    
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
            <div class="ui secondary menu inverted" style="background:#1b1c1d;padding:15px" >
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
        <div class="ui inverted vertical footer segment" style="margin-top:40px;padding:20px">
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
            </div>
        </div>
        {{-- footer --}}
    </div>
</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/semantic.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
      $(document).ready(function(){
        $(".ui.dropdown").dropdown();
      })
</script>
</html>
<main>
  <div class="container">
      <div class="row">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Login') }}</div>
  
                  <div class="card-body">
                      <form method="POST" action="{{ route('login') }}">
                          @csrf
  
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
  
                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
  
                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
  
                                      <label class="form-check-label" for="remember">
                                          {{ __('Remember Me') }}
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Login') }}
                                  </button>
  
                                  @if (Route::has('password.request'))
                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                          {{ __('Forgot Your Password?') }}
                                      </a>
                                  @endif
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>