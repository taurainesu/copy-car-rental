@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="ui two column grid container" style="margin-top: 40px;margin-bottom: 40px;">
                <div class="column">
                    <img class="ui large bordered image" style="margin:auto;" src="https://i.i-sgcm.com/new_cars/cars/11579/11579_g13_b.jpg">
                </div>
                <div class="column" style="margin:auto;text-align: center;">
                    <h1>Mercedes Benz C200</h1>
                    <p><b>Milage : </b>12000 Kilometres</p>
                    <p><b>Fuel Type :</b> Petrol</p>
                    <p><b>Rental Rate : </b>$9.00 USD per day</p>
                    <p style="margin-bottom:20px ;"><b>Location : </b>Milton Park, Harare</p>
                    <button class="ui primary button" style="background-color: #ffb70a;">
                      Reserve Car
                    </button>
                    <a href="#information"><button class="ui button">
                      More Info...
                    </button></a>
                </div>
            </div>
            
            <div class="ui four column grid container" style="margin-top: 40px;margin-bottom: 40px;">
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
        
            <div id="information" class="anchor ui grid container" style="margin-top: 40px;margin-bottom:40px;">
                <h3>Vehicle Info</h3>
                <div class="row">
                    <div class="ui column divider"></div>
                  </div>
                <div class="ui row three column centered">
                    <div class="ui grid two column" style="margin-bottom: 40px;">
                        <div class="ui row centered segment">
                            <div class="two wide column more">
                                <i class="fas fa-rocket icon" style="margin:auto;"></i>
                            </div>
                            <div class="column info">
                                <p style="margin:0;font-size: 14px;">Engine Capacity</p>
                                <p class="big"><b>2L</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="ui grid two column" style="margin:auto 15px">
                        <div class="ui segment row centered">
                            <div class="two wide column more">
                                <i class="fas fa-cogs icon" style="margin:auto;"></i>
                            </div>
                            <div class="column info">
                                <p style="margin:0;font-size: 14px;">Transmission</p>
                                <p class="big"><b>Manual</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="ui grid two column">
                        <div class="ui segment row centered">
                            <div class="two wide column more">
                                <i class="icon fas fa-car" style="margin: auto;"></i>
                            </div>
                            <div class="column info">
                                <p style="margin:0;font-size: 14px;">No. of Seats</p>
                                <p class="big"><b>7</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="ui grid container" style="margin-bottom: 40px;">
                <h3>Reviews (5)</h3>
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
