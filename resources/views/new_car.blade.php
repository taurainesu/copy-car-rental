@extends('layouts.app')

@section('content')
<div class="ui container">

<form method="POST" action="{{route('new_car_post')}}" enctype="multipart/form-data">

@csrf


<label for="brand" class="">{{ __('Type') }}</label>
    <div class="ui input ">

  
        <input name="type" placeholder="" type="text">
    </div>
    
    <div class="ui divider"></div>

    <label for="brand" class="">{{ __('Vehicle Brand') }}</label>
    <div class="ui input ">

  
        <input name="brand" placeholder="" type="text">
    </div>
    
    <div class="ui divider"></div>

    <label for="brand" class="">{{ __('Model') }}</label>
    
    <div class="ui input">
      <input name="model" placeholder="" type="text">
    </div>

    <div class="ui divider"></div>

    <label for="brand" class="">{{ __('Year of Manfacturing') }}</label>
    
    <div class="ui input">
      <input name="year" placeholder="" type="text">
    </div>


    <div class="ui divider"></div>

    <label for="brand" class="">{{ __('Seats') }}</label>
    
    <div class="ui input">
      <input name="seats" placeholder="" type="text">
    </div>

    <div class="ui divider"></div>

    <label for="brand" class="">{{ __('Vehicle Location') }}</label>
    
    <div class="ui input">
      <input name="location" placeholder="" type="text">
    </div>

    <div class="ui divider "></div>

    <label for="brand" class="">{{ __('Vehicle Registration Number') }}</label>
    
    <div class="ui input">
      <input name="vehicle_registration" placeholder="" type="text">
    </div>
    <div class="ui divider "></div>

    <label for="brand" class="">{{ __('Milage') }}</label>
    <div class="ui input">
      <input name="milage" placeholder="" type="text">
    </div>

    <div class="ui divider "></div>
    <label for="brand" class="">{{ __('Fuel') }}</label>
    <div class="ui input">
      <input name="fuel_type" placeholder="" type="text">
    </div>


    <div class="ui divider "></div>
    <label for="brand" class="">{{ __('Transmission Type') }}</label>
    <div class="ui input">
      <input name="transmission" placeholder="" type="text">
    </div>


   


    <div class="ui divider "></div>
    <label for="brand" class="">{{ __('Engine Capacity') }}</label>
    <div class="ui input">
      <input name="engine_capacity" placeholder="" type="text">
    </div>

    


    <div class="ui divider "></div>
    <label for="color" class="">{{ __('Color') }}</label>
    <div class="ui input">
      <input name="color" placeholder="" type="text">
    </div>

    <div class="ui divider "></div>
    <label for="description" class="">{{ __('Description') }}</label>
    <div class="ui input">
      <input name="description" placeholder="" type="text">
    </div>


    <div class="ui divider "></div>
    <label for="condition" class="">{{ __('Condition') }}</label>
    <div class="ui input">
      <input name="condition" placeholder="" type="text">
    </div>






    <div class="ui divider "></div>

    <label for="condition" class="">{{ __('Daily Rate') }}</label>
    
    <div class="ui input">
      <input name="daily_rate" placeholder="ZWL" type="text">
    </div>

    



    <div class="ui divider"></div>
    <label for="image" class="">{{ __('Car Image') }}</label>

    <input id="image" type="file" name="imageUrl" required autocomplete="image">
                
    <div class="ui divider"></div>
                        
    <button type="submit" class="yellow  ui compact button ">{{ __('Register') }}</button>

    </form>
                        
    </div>
@endsection