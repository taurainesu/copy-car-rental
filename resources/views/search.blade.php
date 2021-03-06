@extends('layouts.layout')
@section("content")
<div class="ui container" style="padding:0 0 4% 0">
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
            @if(count($result) > 0)
            <h3>Search Results ({{count($result)}})</h3>
            <div class="ui divider"></div>
            <div class="ui four cards stackable">
                @foreach ($result ?? '' as $car)
                <div class="card">
                    <div class="image">
                        <img style="width:80%;height:100%;margin:auto;padding:20px" src="{{$car->imageUrl}}">
                    </div>
                    <div class="content">
                        <div class="header" style="font-size:16px">{{$car->year}} {{$car->brand}} {{$car->model}}</div>
                        <div class="meta" style="padding-bottom:10px">
                        </div>
                        <p><strong>Milage</strong> : {{$car->milage}}km</p>
                        <p><strong>Location</strong> : {{$car->location}}</p>
                        <p><strong>Rental Rate</strong> : USD{{$car->daily_rate}}/day</p>
                    </div>
                    <div class="extra content">
                        <a href="{{'/cars/info/'.$car->id}}">
                                <button class="ui button icon orange right floated" style="width:48%">
                                View
                                </button>
                              </a>
                              
                                <button @if($car->supplier_id != Auth::id()) class="ui button orange" @else class="ui button orange disabled" @endif  style="width:48%" @click="showModal({{json_encode($car)}})">
                                Reserve
                                </button>
                        </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="column" style="margin:auto;height:60vh;text-align:center;padding:10% 0">
                <img src="https://img.icons8.com/cute-clipart/64/000000/nothing-found.png">
            <h3 style="margin-bottom:30px">No vehicles found...Please try again</h3>
                <button class="ui button orange" onclick="parent.history.back()"><i class="ui icon arrow left"></i> Go Back</button>
            </div>
           
            @endif
        </div>
    </div>
</div>

@endsection

@section('javascript')
@endsection