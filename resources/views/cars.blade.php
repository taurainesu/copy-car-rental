@extends('layouts.layout')
@section("content")

<div class="ui container mb-5">
    <div class="ui column">
        <div class="column twelve wide">
            <div class="column my-4">
                <h3 class="mb-4">Filter Options</h3>
                <div class="column">
                    <div class="ui input mr-2 labeled icon" style="width:14%">
                        <i class="map marker alternate icon"></i>
                        <input type="text" placeholder="Location">
                    </div>
                    <div class="ui input mr-2 labeled icon" style="width:14%">
                        <i class="car icon"></i>
                        <input type="text" placeholder="Model">
                    </div>
                    <div class="ui input mr-2 labeled icon" style="width:14%">
                        <i class="object group icon"></i>
                        <input type="text" placeholder="Brand">
                    </div>
                    <div class="ui input mr-2 labeled icon" style="width:21%">
                        <i class="calendar alternate icon"></i>
                        <input type="text" placeholder="Year of Manufacturing" maxlength="4" min="1800" max="2020">
                    </div>
                    <div class="ui input mr-5 labeled right" style="width:14%">
                        <label for="min" class="ui label">$</label>
                        <input type="text" placeholder="Min Price" name="min">
                    </div>
                    <div class="ui input mr-2 labeled right" style="width:14%">
                        <label for="max" class="ui label">$</label>
                        <input type="text" placeholder="Max Price" name="max">
                    </div>
                </div>
            </div>
            <h2 class="my-5" style="text-align:center">Our Fleet</h2>
            <div class="ui four cards">
                @foreach ($cars as $car)
                <div class="card">
                    <div class="image">
                        <img style="width:80%;height:100%;margin:auto;padding:20px" src="{{$car->imageUrl}}">
                    </div>
                    <div class="content">
                        <div class="header" style="font-size:16px">{{$car->year}} {{$car->brand}} {{$car->model}}</div>
                        <div class="meta" style="padding-bottom:10px">
                        </div>
                        <p style="font-size:12px">Milage : {{$car->milage}}km</p>
                        <p style="font-size:12px">Location : {{$car->location}}</p>
                        <p style="font-size:12px">Rental Rate : <strong>$ZWL{{$car->daily_rate}}/day</strong></p>
                    </div>
                    <div class="column" style="padding:0;margin:0"> 
                        <button class="orange ui button" style="width:100%;border-radius:0px">Reserve Now</button>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection