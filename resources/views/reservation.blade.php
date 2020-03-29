@extends('layouts.layout')
@section('content')
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="ui container">

<div class="ui  mini modal" id="payment_modal" style="height: 200px">

 
  <div class="ui active dimmer">
    <div class="ui indeterminate text loader">Checking payment status</div>

  </div>

</div>




<br>
<br>



<div class="four column centered row">
    <div class="column">

    <div class="ui unstackable  centered steps">
  <div class="step">
    <i class="car icon"></i>
    <div class="content">
      <div class="title">Reservation</div>
      <div class="description">Your reservation is {{$reservation->reservation_status}}</div>
    </div>
  </div>
  <div class="active step">
    <i class="dollar icon"></i>
    <div class="content">
      <div class="title">Payment Status</div>
      <div class="description">{{$reservation->payment_status}}</div>
    </div>
  </div>
  <div class="disabled step">
    <i class="info circle icon"></i>
    <div class="content">
      <div class="title">Confirmation status</div>
      <div class="description">The reservation is **approval status**</div>
    </div>
  </div>
</div>
    </div>
    
  </div>





<div class="ui   column centered grid">
  <div class="ten column centered">

 


  </div>

</div>












<div class="ui segments">
  <div class="ui segment">
  <h3>Vehicle Details</h3>

  <div class="ui three column grid">
  <div class="column">
    <div class="ui segment">
    <p><strong>Name</strong>{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</p>
    <p><strong>Fuel :</strong>{{$reservation->car["fuel_type"]}} </p>
    <p><strong>Transmission :</strong>{{$reservation->car["transmission"]}}  </p>
    <p><strong>Location :</strong>{{$reservation->car["location"]}} </p>
    </div>
  </div>
  <div class="column">
    <div class="ui segment">
    <img class="ui fluid small borderd rounded image"  src="{{$reservation->car->imageUrl}}" >
    </div>
  </div>
  <div class="column">
    <div class="ui segment">
    <a href="/reservation/update/{{$reservation->id}}"class="ui green  icon button">
    <i class="icon user"></i></a>
    <a href="/reservation/update/{{$reservation->id}}"class="ui icon green button"><i class="eye icon"></i>
  
  </a>
    <button type="submit" class="ui icon button"><i class="icon delete"></i></button>
    
    </div>
  </div>
</div>

  <div class="ui segments">
    <div class="ui segment">
      <h3>Pick up Details</h3>
      <p><strong>Owner Name :</strong>{{$reservation->car->user["name"]}}</p>

      <p><strong>Address</strong>  :{{$reservation->car["physical_address"]}}</p>

    </div>
    
  </div>
  <div class="ui segment">
    <h3>Payment Details</h3>
    
    <p>no payment yet </p>
  </div>
  
  
</div>

</div>







@endsection


@section('javascript')
<script>
@if($reservation->payment_status=="Pending") 

$(window).on('load',function(){
  $('#payment_modal').modal({
          closable: false
                        });
  $('#payment_modal').modal('show');

    var poll =setInterval(function(){
    $.ajaxSetup({
                  headers:{
                          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                         }     });
  $.ajax(
    {type:'POST',
        url:'/poll',
        data:{id:'{{$reservation->id}}'},
        dataType:'json',
        success:function(data){
          if(data['status']=='paid'){

            alert('success');
            };


          if(data['status']=='failed'){
               alert('insufficient funds');
              }
            },
        error:function(){
          alert('Cant connect to paynow server')
        },

        complete:function(){
                clearInterval(poll) 
                $('#payment_modal').modal('hide');  
            }

        
        }
        );},
        10000);




      

    });

@endif


</script>


@endsection