@extends('layouts.app')
@section('content')

<div class="ui container">
		
    <div class="ui card col-md-12">

    <div class="content">
        <h3>Rent a Car</h3>
            <div class="ui floating search dropdown button col-md-12">
          <input class="search" autocomplete="off" tabindex="0">	<i class="map marker alternate link icon"></i><span class="text">Where are you located ?</span>
              <div class="menu" tabindex="-1">
            <div class="item">Harare</div>
            <div class="item">Bulawayo</div>
            <div class="item">Masvingo</div>
                <div class="item">Mutare</div>
            <div class="item">Gweru</div>

              </div>
                </div>
        </br>
        </br>
            <div class="ui floating search dropdown button col-md-12">
              <input class="search" autocomplete="off" tabindex="0"><span class="text">Vehicle Type</span>
                  <div class="menu" tabindex="-1">
                      <div class="item"><i class="map marker alternate link icon"></i>Hatchback</div>
                      <div class="item">SUV</div>
                      <div class="item">Sedan</div>
                  </div>
                </div>
        </br>
        </br>


        <div class="ui two column centered grid">
        <div class="column"><div class="ui input fluid">
            <i class="calendar alternate outline link icon"></i>
          <input placeholder="End Date" type="date">
            </div></div>
          <div class="column"><div class="ui input fluid">
              <i class="calendar alternate outline link icon"></i>
          <input placeholder="Start Date" type="date">
        </div> </div>
        </div>


        <div class="ui divider"></div>


          <button class="yellow  ui compact button col-md-12">Find Vehicles</button>









    </div>
    </div>

    <h3 style="margin-top:40px">Featured Vehicles</h3>
    <div class="ui four cards">
      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>

    
      </div>




      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>

    
      </div>





      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>

    
      </div>




      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>

    
      </div>




      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>

    
      </div>





      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>

    
      </div>
      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div> 
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>
      </div>
      <div class="card">
    <div class="image">
      <img src="{{ asset('image.png') }}">
    </div>
    <div class="content">
      <div class="header">Toyota Carina</div>
      <div class="meta">
    <a class="group">2005</a>
    </div>
     <h5>Harare</h5>
    <p class="description">Very comfortable Vehicle</p>
    <div class="ui two column centered grid">
        <div class="column"><h5>$54 per day</h5></div>
          <div class="column"> <button class="yellow ui compact button reservationbutton">Reserve</button></div>
        </div>
    </div>
    <div class="extra center aligned">
      <div data-rating="4" class="ui star rating"><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i><i class="icon active"></i></div>
    </div>
      </div>
    </div>
        </div>
@endsection