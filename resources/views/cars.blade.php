@extends('layouts.layout')
@section("content")

<div class="ui container" style="padding:3% 0">
    @if(count($search) > 0)
    <div class="ui row grid">
        <div class="column ">
            <h1 style="padding-bottom:15px">Vehicle Inventory</h1>
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
    @else
    <div class="column" style="margin:auto;height:70vh;text-align:center;padding:10% 0">
        <img src="https://img.icons8.com/cute-clipart/64/000000/nothing-found.png">
        <h3>No vehicles found...Please try again</h3>
        <button class="ui button orange" onclick=" parent.history.back();"><i class="ui icon arrow left"></i> Go Back</button>
    </div>
    @endif
</div>

@endsection