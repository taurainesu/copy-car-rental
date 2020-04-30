@extends('suppliers.layout')


@section('content')
<div class="ui container">



<div class="ui horizontal statistics">
    <div class="statistic">
      <div class="value">
  <i class="teal  car icon"></i>
  {{$cars->count()}}
      </div>
      <div class="label">
  Vehicles
      </div>
    </div>
    <div class="statistic">
      <div class="value">
  <i class="orange dollar sign icon"></i>
5
      </div>
      <div class="label">
  In your Account
      </div>
    </div>
    <div class="statistic">
      <div class="value">
  <i class="blue calendar check icon"></i>
  {{$reservations->count()}}
      </div>
      <div class="label">
  Resevations
      </div>
    </div>
  </div>


</div>
@endsection
