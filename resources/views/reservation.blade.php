@extends('layouts.layout')
@section('content')
<div class="ui container">

<div class="ui segments">
  <div class="ui segment">
  <h3>Vehicle Details</h3>
  <div class="ui three column  grid">
          <div class="column">

          <p><strong>Name</strong>{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</p>
    <p><strong>Fuel :</strong>{{$reservation->car["fuel_type"]}} </p>
    <p><strong>Transmission :</strong>{{$reservation->car["transmission"]}}  </p>
    <p><strong>Location :</strong>{{$reservation->car["location"]}} </p>
          </div>
          <div class="column" >

          <img class="ui fluid small borderd rounded image"  src="{{$reservation->car->imageUrl}}" >
          </div>

          <div class="column">
          <div class="ui two column  grid">
<div class="column">
<select class="ui fluid dropdown" name="fuel_type" required>
        <option value="update">Update</option>
    <option value="cancel">Cancel</option>
    
   
      </select>

          <button type="submit" class="yellow ui compact button">Apply</button>



</div>

<div class="column">
          <button type="submit" class="green ui compact button">{{ $reservation->reservation_status}}</a>



</div>

          

          
          </div>
          </div>



    
  </div>
  <div class="ui segments">
    <div class="ui segment">
      <h3>Pick up Details</h3>
      <p><strong>Owner Name :</strong>{{$reservation->car->user["name"]}}</p>

      <p><strong>Address</strong>  :{{$reservation->car["physical_address"]}}</p>

    </div>
    
  </div>
  <div class="ui segment">
    <h3>Payment Details</h3>

    <p>no payment yet </p>
  </div>
  
  
</div>

</div>


@endsection