@extends('layouts.layout')
@section("content")
<div class="ui container" style="padding:0 0 3% 0">
    <div class="ui column">
        <div class="column twelve wide">
            <div class="column" style="display:none">
                <h3>Filter Options</h3>
                <div class="column">
                    <div class="ui input labeled icon" style="width:25%">
                        <i class="map marker alternate icon"></i>
                        <input type="text" placeholder="Location">
                    </div>
                    <div class="ui input labeled icon" style="width:25%">
                        <i class="car icon"></i>
                        <input type="text" placeholder="Model">
                    </div>
                    <div class="ui input labeled icon" style="width:25%">
                        <i class="object group icon"></i>
                        <input type="text" placeholder="Brand">
                    </div>
                    <div class="ui input mr-2 labeled icon" style="width:24%">
                        <i class="calendar alternate icon"></i>
                        <input type="text" placeholder="Year of Manufacturing" maxlength="4" min="1800" max="2020">
                    </div>
                </div>
            </div>
            @if(count($results) > 0)
        <h1 style="padding:10px 0 15px 0">Search Results ({{count($results)}})</h1>
            <div class="ui four cards">
                @foreach ($results as $car)
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
                        @if($car->car_id ?? false)
                        <a href="{{'/cars/info/'.$car->car_id}}">
                            <button class="ui button icon orange right floated" style="width:48%">
                            View
                            </button>
                        </a>
                        @else
                        <a href="{{'/cars/info/'.$car->id}}">
                            <button class="ui button icon orange right floated" style="width:48%">
                            View
                            </button>
                        </a>
                        @endif
                        <button class="ui button orange" style="width:48%">
                          Reserve
                        </button>

                      </div>
                </div>
            @endforeach
            </div>
            @else
            <div class="column" style="margin:auto;height:50vh;text-align:center;padding:15% 0">
                <h2>No vehicles found...Please try again</h2>
            </div>
           
            @endif
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script>
        console.log(@json($results));
    </script>
@endsection