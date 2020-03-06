@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="ui container" style="margin-bottom:20px;padding:20px 0">
              <div class="column">
                
                  <div class="ui two column grid" style="margin:auto">
                    <div class="column">
                      <h1>{{$car->year}} {{$car->brand}} {{$car->model}}</h1>
                    </div>
                   
                    <div class="column" style="text-align:end;margin:0">
                      <button class="ui orange button">
                        Reserve Car
                      </button>
                      <a href="#information"><button class="ui button secondary">
                        More Info...
                      </button></a>
                    </div>
                  </div>
                  <div class="ui divider"></div>

              </div>
              <div class="ui three column grid">
                <div class="two wide column">
                  <div style="margin:50px 0">
                    <p style="margin:0;padding:0;font-size:16px"><b> <i class="map marker alternate icon" style="margin-left:-5px"></i>Location</b></p>
                    <p style="margin:auto;padding:0">{{$car->location}}</p>
                  </div>

                  <div>
                    <p style="margin:0;padding-top:10px;font-size:16px"><b><i class="money bill alternate icon" style="margin-right:10px"></i>Daily Rate</b></p>
                    <p style="margin:0;padding:0">$ZWL{{$car->daily_rate}}</p>
                  </div>
                  
                </div>

                <div class="twelve wide column" style="margin:0px 0">
                  <img class="ui image" style="height:100%;width:50%;margin:auto;" src="{{$car->imageUrl}}">
                </div>

                <div class=" two wide column" style="text-align:end;">
                  <div style="margin:50px 0">
                    <p style="margin:0;padding:0;font-size:16px"><b><i class="car icon" style="margin-right:10px"></i>Fuel Type</b></p>
                    <p style="margin:0;padding:0">{{$car->fuel_type}}</p>
                  </div>

                  <div>
                    <p style="margin:0;padding-top:10px;font-size:16px"><b><i class="location arrow icon" style="margin-right:10px"></i>Milage</b></p>
                    <p style="margin:0;padding:0">{{$car->milage}} Km</p>
                  </div>
                </div>
              </div>
              
              <div class="column" style="margin:auto;text-align: center; padding-bottom:20px;display:none">
                 
              </div>
          </div>
          
          <div class="ui four column grid container" style="margin-bottom:40px;">
              <div class="column">
                  <img class="ui large bordered image" src="https://i.i-sgcm.com/new_cars/cars/11579/11579_g31_b.jpg">
              </div>
              <div class="column">
                  <img class="ui large bordered image" src="https://i.i-sgcm.com/new_cars/cars/11579/11579_g39_b.jpg">
              </div>
              <div class="column">
                  <img class="ui large bordered image" src="https://i.i-sgcm.com/new_cars/cars/11579/11579_g40_b.jpg">
              </div>
              <div class="column">
                  <img class="ui large bordered image" src="https://i.i-sgcm.com/new_cars/cars/11579/11579_g37_b.jpg">
              </div>
          </div>
      
          <div id="information" class="anchor ui grid container">
              <h2>Vehicle Info</h2>
              <div class="row">
                  <div class="ui column divider"></div>
                </div>
              <div class="ui row three column centered">
                  <div class="ui grid two column" style="margin-bottom:40px;">
                      <div class="ui row centered segment">
                          <div class="two wide column more">
                              <i class="fas rocket icon" style="margin:auto;"></i>
                          </div>
                          <div class="column info">
                              <p style="margin:0;font-size: 14px;">Engine Capacity</p>
                          <p class="big"><b>{{$car->engine_capacity}} Litres</b></p>
                          </div>
                      </div>
                  </div>
                  <div class="ui grid two column" style="margin:auto 15px">
                      <div class="ui segment row centered">
                          <div class="two wide column more">
                              <i class="fas cogs icon" style="margin:auto;"></i>
                          </div>
                          <div class="column info">
                              <p style="margin:0;font-size: 14px;">Transmission</p>
                          <p class="big"><b>{{$car->transmission}}</b></p>
                          </div>
                      </div>
                  </div>
                  <div class="ui grid two column">
                      <div class="ui segment row centered">
                          <div class="two wide column more">
                              <i class="fas car icon" style="margin: auto;"></i>
                          </div>
                          <div class="column info">
                              <p style="margin:0;font-size: 14px;">No. of Seats</p>
                          <p class="big"><b>{{$car->seats}}</b></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      
          <div class="ui grid container" style="margin-bottom:40px;margin-top:0px">
              <h2>Reviews (5)</h2>
              <div class="row" style="margin-bottom: 20px;">
                <div class="ui column divider"></div>
              </div>
              <div class="">
                  <div class="ui cards four">
                      <div class="card">
                        <div class="content">
                          <p class="right floated" style="margin-left: 5px;"><b>4.7</b></p>
                          <i class="right floated star icon"></i>
                          <div class="header">Elliot Fu</div>
                          <div class="meta">22 Jan 2020</div>
                          <div class="description">
                            Elliot Fu is a film-maker from New York.
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="content">
                          <p class="right floated" style="margin-left: 5px;"><b>3.9</b></p>
                          <i class="right floated star icon"></i>
                          <div class="header">Veronika Ossi</div>
                          <div class="meta">22 Jan 2020</div>
                          <div class="description">
                            Veronika Ossi is a set designer living in New York who enjoys kittens, music, and partying.
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="content">
                          <p class="right floated" style="margin-left: 5px;"><b>4.0</b></p>
                          <i class="right floated star icon"></i>
                          <div class="header">Jenny Hess</div>
                          <div class="meta">22 Jan 2020</div>
                          <div class="description">
                            Jenny is a student studying Media Management at the New School
                          </div>
                        </div>
                      </div>
                      
                        <div class="card">
                          <div class="content">
                            <p class="right floated" style="margin-left: 5px;"><b>4.8</b></p>
                          <i class="right floated star icon"></i>
                            <div class="header">Jenny Hess</div>
                            <div class="meta">22 Jan 2020</div>
                            <div class="description">
                              Jenny is a student studying Media Management at the New School
                            </div>
                          </div>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
