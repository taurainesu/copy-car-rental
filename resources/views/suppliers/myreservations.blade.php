@extends('suppliers.layout')

@section('content')






<div class="ui container" style="padding:30px 0">

  <h3>My Reservations</h3>

  <hr/>
  <table class="ui very basic striped single right aligned table">
      <thead>
        <tr>
          <th class="left aligned">Car</th>
          <th>Pick Up Date</th>
          <th>Return Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>

      </thead>
      <tbody>
 @foreach ($reservations as $reservation)
        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td >{{date("D d M Y",strtotime($reservation->pick_up_date))}} </td>
          <td>{{date("D d M Y",strtotime($reservation->return_date))}}</td>
          <td class="positive">{{ ucfirst($reservation->reservation_status)}}</td>
          <td class="positive"><a href="{{route('view_supplier_reservation', $reservation->id)}}" class="yellow ui compact button">VIEW</a></td>
          </tr>



          @endforeach
      </tbody>
    </table>





</div>



@endsection
