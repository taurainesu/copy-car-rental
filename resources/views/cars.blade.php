@extends('layouts.layout')
@section("content")

<div class="ui container" style="padding:3% 0">
    <div class="ui row two column grid">
        <div class="column three wide card">
            <h3>Filter Options</h3>
            <form>
                <div class="ui selection dropdown input">
                    <input type="hidden" name="gender">
                    <i class="dropdown icon"></i>
                    <div class="default text">Where are you?</div>
                    <div class="menu" tabindex="-1">
                        <div class="item" data-value="Harare">Harare</div>
                        <div class="item" data-value="Bulawayo">Bulawayo</div>
                        <div class="item" data-value="Masvingo">Masvingo</div>
                        <div class="item" data-value="Mutare">Mutare</div>
                        <div class="item">Gweru</div>
                    </div>
                </div>
                  
                  <div class="ui selection dropdown input">
                    <input type="hidden" name="gender">
                    <i class="dropdown icon"></i>
                    <div class="default text">Vehicle Type</div>
                    <div class="menu" tabindex="-1">
                        <div class="item" data-value="Harare">Trucks</div>
                        <div class="item" data-value="Bulawayo">SUV</div>
                        <div class="item" data-value="Masvingo">Sedan</div>
                        <div class="item" data-value="Mutare">Kombi</div>
                    </div>
                  </div>

                  <div class="ui selection dropdown input">
                    <input type="hidden" name="gender">
                    <i class="dropdown icon"></i>
                    <div class="default text">Model/Brand</div>
                    <div class="menu" tabindex="-1">
                        <div class="item" data-value="Harare">Toyota</div>
                        <div class="item" data-value="Bulawayo">Mercedes Benz</div>
                        <div class="item" data-value="Masvingo">Audi</div>
                        <div class="item" data-value="Mutare">Mazda</div>
                        <div class="item">Hyundai</div>
                    </div>
                  </div>

                  <div class="ui selection dropdown input">
                    <input type="hidden" name="gender">
                    <i class="dropdown icon"></i>
                    <div class="default text">Vehicle Type</div>
                    <div class="menu" tabindex="-1">
                        <div class="item" data-value="Harare">Trucks</div>
                        <div class="item" data-value="Bulawayo">SUV</div>
                        <div class="item" data-value="Masvingo">Sedan</div>
                        <div class="item" data-value="Mutare">Kombi</div>
                    </div>
                  </div>

                  <button class="ui button icon" style="width:100%;margin:0">Search<i class="search icon"></i></button>
            </form>
        </div>
        <div class="column twelve wide"  style="padding-left:6%">
            <h3>Vehicle Inventory</h3>
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