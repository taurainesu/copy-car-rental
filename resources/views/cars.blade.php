@extends('layouts.layout')
@section("content")

<div class="ui container" style="padding:3% 0">
    <div class="ui row two column grid">
        <div class="column three wide">
            <h3>Filter Options</h3>
            <form>
                <div class="ui input floating dropdown w-100 search">
                   
                    <input type="text" placeholder="Search...">
                    <span class="text">Where are you located ?</span>
                    <div class="menu" tabindex="-1">
                        <div class="item" data-value="Harare">Harare</div>
                        <div class="item" data-value="Bulawayo">Bulawayo</div>
                        <div class="item" data-value="Masvingo">Masvingo</div>
                        <div class="item" data-value="Mutare">Mutare</div>
                        <div class="item">Gweru</div>
                    </div>
                    <input/>
                  </div>
                  <div class="ui input">
                    <input type="text" placeholder="Search...">
                  </div>
                  <div class="ui input">
                    <input type="text" placeholder="Search...">
                  </div>
                  <div class="ui input">
                    <input type="text" placeholder="Search...">
                  </div>
            </form>
        </div>
        <div class="column twelve wide"  style="padding-left:5%">
            <h3>All</h3>
            <div class="ui three cards">
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
                    <div class="extra aligned ui two column grid">
                        <div class="column" style="padding:0;margin:0"> 
                            <a data-href="reserve/{{$car->id}}" class="ui compact testing">Reserve</a>
                        </div>

                        <div class="column" style="text-align:end;padding:0;margin:0">

                            <a data-href="reserve/{{$car->id}}" class="ui compact testing">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection