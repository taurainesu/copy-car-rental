@extends('layouts.layout')
@section('content')


<div class="ui container" style="padding:30px 0">


  <table class="ui right aligned celled table">
      <thead>

        <tr><th class="left aligned">Car</th>
        <th>Pick Up Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th></th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td >{{$reservation->pick_up_date}} </td>
          <td>{{$reservation->return_date}}</td>
          <td class="positive">{{ $reservation->reservation_status}}</td>
          <td class="positive"><a href="reservation/view/{{$reservation->id}}" class="yellow ui compact button">VIEW</a></td>
          </tr>



          @endforeach
      </tbody>
    </table>

  



</div>



@endsection