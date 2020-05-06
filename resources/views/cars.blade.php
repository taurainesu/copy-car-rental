@extends('layouts.layout')
@section("content")

<div class="ui container" style="padding:2% 0 4% 0">
    @if(count($search) > 0)
    <div class="ui row grid">
        <div class="column ">
            <h3>Our Vehicle Fleet</h3>
            <div class="ui divider"></div>
            <div class="ui four cards stackable">
                @foreach ($search as $car)
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
                    <a href="{{'cars/info/'.$car->id}}">
                            <button class="ui button icon orange right floated" style="width:48%">
                            View
                            </button>
                          </a>
                          
                            <button @if($car->supplier_id != Auth::id()) class="ui button orange" @else class="ui button orange disabled" @endif style="width:48%" @click="showModal({{$car}})">
                            Reserve
                            </button>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    @else
    <div class="column" style="margin:auto;height:60vh;text-align:center;padding:10% 0">
        <img src="https://img.icons8.com/cute-clipart/64/000000/nothing-found.png">
        <h3>No vehicles found...Please try again</h3>
        <button class="ui button orange" onclick=" parent.history.back();"><i class="ui icon arrow left"></i> Go Back</button>
    </div>
    @endif
</div>

@endsection

@section('javascript')

@endsection