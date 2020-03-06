@extends('layouts.layout')
@section("content")

<div class="ui container" style="padding:3% 0">
    <div class="ui row grid">
        <div class="column ">
            <h2>Vehicle Inventory</h2>
            <div class="ui four cards">
                @foreach ($search as $car)
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
                    <div class="extra content">
                    <a href="{{'cars/info/'.$car->id}}">
                            <button class="ui button icon orange right floated" style="width:48%">
                            View
                            </button>
                          </a>
                          <a href="">
                            <button class="ui button orange" style="width:48%">
                            Reserve
                            </button>
                          </a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection