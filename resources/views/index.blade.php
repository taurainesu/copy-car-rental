@extends('layouts.layout')
@section('content')

<div style="background:url('/toyota.jpg') no-repeat;background-size:cover;padding:6% 0">
	<div class="ui container">
		<div class="ui card row" style="width:40%;padding:20px">
			<div class="content">
				<h3>Rent a Car</h3>
				<div class="ui divider"></div>
					<div class="ui floating dropdown labeled icon button w-100 search" id="loc" style="width:100%">
				<input class="search" autocomplete="off" tabindex="0" name="location">
				<span class="text">Where are you located ?</span>
				<i class="map marker alternate icon"></i>
						<div class="menu" tabindex="-1">
					<div class="item" data-value="Harare">Harare</div>
					<div class="item" data-value="Bulawayo">Bulawayo</div>
					<div class="item" data-value="Masvingo">Masvingo</div>
						<div class="item" data-value="Mutare">Mutare</div>
					<div class="item">Gweru</div>
	
						</div>
						</div>
	

				</br>
				</br>
	
					<div class="ui floating search dropdown labeled icon button w-100" style="width:100%" id="carType">
					<input class="search" autocomplete="off" tabindex="0" name="carType">
					<span class="text">Vehicle Type</span>
					<i class="car alternate icon"></i>
						<div class="menu" tabindex="-1">
							<div class="item" data-value="Hatchback">Hatchback</div>
							<div class="item" data-value="SUV">SUV</div>
							<div class="item" data-value="Sedan">Sedan</div>
	
						</div>
						</div>
					
	
				</br>
				</br>
	
	
				<div class="ui two column centered grid">
				<div class="column"><div class="ui input fluid">
					
				<input placeholder="Start Date" type="date" name="pickUpDate" id="pickUpDate">
					</div></div>
				<div class="column"><div class="ui input fluid">
			
				<input placeholder="End Date" type="date" name="dropOffDate" id="dropOffDate">
				</div> </div>
				</div>
	
	
				<div class="ui divider"></div>
	
	
				<button class="orange ui compact inverted button" id="search">Find Vehicles</button>
	
			</div>
		</div>
	</div>
</div>

	<div class="ui container" style="padding:20px 0">
		@if(!empty($search))
		<h3>Featured Vehicles</h3>
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
				<div class="extra aligned ui two column grid">
					<div class="column" style="padding:0;margin:0"> 
						<a data-href="reserve/{{$car->id}}" class="yellow ui compact testing">Reserve</a>
					</div>

					<div class="column" style="text-align:end;padding:0;margin:0">

						<a data-href="reserve/{{$car->id}}" class="yellow ui compact testing">View</a>
					</div>
				</div>
			</div>
		@endforeach
		</div>

		@else
		<h2 style="padding-bottom:20px">Search Results for </h2>
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
				<div class="extra aligned ui two column grid">
					<div class="column" style="padding:0;margin:0"> 
						<a data-href="reserve/{{$car->id}}" class="yellow ui compact testing">Reserve</a>
					</div>

					<div class="column" style="text-align:end;padding:0;margin:0">

						<a data-href="reserve/{{$car->id}}" class="yellow ui compact testing">View</a>
					</div>
				</div>
			</div>
		@endforeach
		</div>
		
		@endif

		

	</div>

  @endsection

  @section("javascript")

  <script>
	  $("#search").click(function(){
		window.document.location = "http://localhost:3000/cars/search?location="+$("#loc").dropdown("get value") +
		"&carType="+$("#carType").dropdown("get value")+
		"&pickUpDate="+$("#pickUpDate").val()+
		"&dropOffDate="+$("#dropOffDate").val();
	  })
  </script>
@endsection