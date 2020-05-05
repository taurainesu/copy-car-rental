@extends('layouts.layout')
@section('content')
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="ui container">

  <div class="ui tiny modal middle aligned " id="reservation_review_modal" style="display:none">

    <div class="header">Write a Review of the Rental</div>
            <div class="content">
<form  method="POST" action="{{route('review_reservation',$reservation->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="ui form segment">
  <div class="field">
    <label>Review</label>
    <textarea placeholder="you can write in any language" name="comment"  > </textarea>
  </div>

  <button class="ui primary button"   type="submit"  data-tooltip="Submit" data-position="top left">
     Submit
  </button>
     </div>

    </form>
  </div>

</div>



<div class="ui tiny modal middle aligned " id="car_review_modal" style="display:none">

  <div class="header">Write a Review of the Vehicle</div>
          <div class="content">
<form  method="POST" action="{{route('review_car',$reservation->car->id)}}" enctype="multipart/form-data">
    @csrf
    <div class="ui form segment">
    <input hidden value="{{$reservation->id}}" name="reservation_id"/>
    <div class="field">
      <label>Rating</label>
      <select class="ui dropdown" name="rating">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
<div class="field">
  <label>Review</label>
  <textarea placeholder="you can write in any language" name="review"> </textarea>
</div>

<button class="ui primary button"   type="submit"  data-tooltip="Submit" data-position="top left">
   Submit
</button>
   </div>

  </form>
</div>

</div>




  <div class="ui tiny modal middle aligned " id="edit_modal" style="display:none">
    <i class="close icon"></i>
            <div class="header">Update  Reservation</div>
            <div class="content">
            <form  method="POST" action="{{route('update_reservation',$reservation->id)}}" enctype="multipart/form-data" >
            @csrf
            <div class="ui two column centered grid">
            <div class="column"><div class="ui input fluid ">
            <input onclick="datepicker()" id="date_picker3" autocomplete="off" name="pick_up_date" placeholder="Start Date" type="text" required>
            </div></div>
            <div class="column"><div class="ui input fluid">
            <input id="date_picker4" name="return_date"placeholder="End Date"  autocomplete="off" required>
            </div> </div>
            </div>

            <div class="ui divider"></div>

            <div class="ui divider"></div>
            <div class="ui two column  grid">
            <h5 id="attribute1">Daily rate $    </h5> <strong id="total_price1"> price</strong>
            </div>

  </br>

  <div id="more_money" class="ui input" style="display: none;">

    <p id="amount">amount</p>  <p id="paragraph"><p>

  </div>

  <div id="radio_money"  style="display: none;">

    <div class="ui divider"></div>
    <h5>Payment method</h5>

<div class="inline fields">

  <div class="field">
  <div class="ui radio checkbox">
    <input  id="ecoradio" type="radio" name="payment_method" value="ecocash">
<label>Ecocash</label>
</div>
</div>
<div class="field">
<div class="ui radio checkbox">
<input id="oneradio" type="radio" name="payment_method" value="onemoney">
<label>One Money</label>
</div>
</div>
<div class="field">
<div class="ui radio checkbox">
<input  id="otherradio" type="radio" name="payment_method" value="other">
<label>Other Methods</label>
</div>
</div>

</div>

  </div>


  <div id="mobile_money" class="ui input" style="display: none;">
    <label>Phone Number</label>
            <input type="text" name="phone_number" value=""></input>
        </div>








      <div class="ui divider"></div>

            <button type="submit" id="the_button" class="orange ui compact inverted button">UPDATE</button>

            </form>
                </div>

            </div>




  <div class="ui mini modal middle aligned " id="delete_modal">

    <i class="close icon"></i>
    <div class="header modal_header">Delete Car</div>
    <div class="content">
      <p class="modal_text">Are you sure you want to delete this Vee</p>
      <button class="ui red button">No</button>
      <a href-="" class="ui green button yes">Yes</a>

    </div>

  </div>


<div class="ui  mini modal" id="payment_modal" style="height: 200px">


  <div class="ui active dimmer">
    <div class="ui indeterminate text loader">Checking payment status</div>

  </div>

</div>




<br>
<br>


<div class="ui steps">
    <div class="step">
      <i class="car icon"></i>
      <div class="content">
        <div class="title">Reservation</div>
        <div class="description">You have made a reservation from <strong>{{date("D d M Y",strtotime($reservation->pick_up_date))}}</strong> to <strong>{{date("D d M Y",strtotime($reservation->return_date))}}</strong></div>
      </div>
    </div>
    <div class="active step">
      <i class="dollar icon icon"></i>
      <div class="content">
        <div class="title">Payment Status</div>
        <div class="description"><p id="payment_status">{{ucwords($reservation->payment->status)}}</p></div>
      </div>
    </div>
    <div class="disabled step">
        <i class="info circle icon"></i>
        <div class="content">
          <div class="title"><h3>Confirmation status</h3></div>
          <div class="description">Awaiting confirmation from owner</div>
        </div>
    </div>
  </div>






  <div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui three stackable cards">
            <div class="card">
                <div class="ui left piled segment">

                    <h3 class="ui header text-center" style="margin-top: 0px;" >Vehicle Details</h3>
                    <div class="floated right text-center description">
                        <p><strong>Name</strong>{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</p>
                        <p><strong>Fuel :</strong>{{$reservation->car["fuel_type"]}} </p>
                        <p><strong>Transmission :</strong>{{$reservation->car["transmission"]}}  </p>
                        <p><strong>Location :</strong>{{$reservation->car["location"]}} </p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="ui left piled segment">
                    <img src="{{$reservation->car->imageUrl}}" class="ui center floated image">


                </div>
            </div>
            <div class="card">
                <div class="ui left piled segment">





                      <div class="ui buttons">
                        <button class="ui green button"  data-tooltip="Accept Vehicle" data-position="top left" onclick="showModal(&quot;/reservation/accept/{{$reservation->id}}&quot;,
                          &quot;Accept Vehicle&quot;,
                         &quot;Are you sure you want to Accept this Vehicle &quot;)"> <i class="thumbs up icon"   style="color:#ffffff"></i> Accept</button>
                        <div class="or"></div>
                        <button class="ui red button" data-tooltip="Decline Vehicle" data-position="top left" onclick="showModal(&quot;/reservation/decline/{{$reservation->id}}&quot;,
                          &quot;Decline Vehicle&quot;,
                         &quot;Are you sure you want to Decline this Vehicle &quot;)"> <i class="thumbs down icon"   style="color:#ffffff"></i>   Decline</button>
                      </div>


<div class="ui hidden divider"></div>

                      <div class="ui primary button"   onclick="showEditModal()"  data-tooltip="Edit Reservation" data-position="top left">
                        <i class="pencil alternative icon"></i> Edit Reservation
                      </div>

                      <div class="ui hidden divider"></div>

                      <div class="ui orange button"   onclick="showModal(&quot;/reservation/cancel/first/a/{{$reservation->id}}&quot;,
                        &quot;Cancel Reservation&quot;,
                       &quot;Are you sure you want to cancel this Reservation &quot;)"  data-tooltip="Cancel Reservation" data-position="top left">
                        <i class="x icon"></i> Cancel Reservation
                      </div>

<div class="ui hidden divider"></div>

                      <div class="ui orange button"  onclick="showCarReviewModal()"  data-tooltip="Review Vehicle" data-position="top left">
                        <i class="pencil alternative icon"></i> Write  a Review
                      </div>












                </div>
            </div>
        </div>
    </div>
</div>


<div class="ui segments">
  <div class="ui segment">


  <div class="ui segments">
    <div class="ui segment">
      <h3>Pick up Details</h3>
      <p><strong>Owner Name :</strong>{{$reservation->car->user["name"]}}</p>

      <p><strong>Address</strong>  :{{$reservation->car["physical_address"]}}</p>

    </div>

  </div>
  <div class="ui segment">
    <h3>Payment Details</h3>

    <p><strong>Payment Status :</strong>{{ucwords($reservation->payment->status)}}</p>
    <p><strong>Amount :</strong>{{ucwords($reservation->payment->amount)}} </p>
    <p><strong>Payment Method :</strong>{{ucwords($reservation->payment->mode)}} </p>
    <p><strong>Payout:</strong>Pending </p>
  </div>


</div>

</div>







@endsection


@section('javascript')
<script>

function showModal(var1,var2,var3){
  $("#delete_modal").modal({

  });



    $(".yes").attr("href",arguments[0]);
    $(".modal_text").text(arguments[2]);
    $(".modal_header").text(arguments[1]);
    $("#delete_modal").modal("show");
  }

  @if($reservation->payment->status=="pending")

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
              console.log('hey');
            $("#payment_status").text("Paid");

              alert('Reservation completed succesfully');
              }


          else if(data['status']=='cancelled'){
               alert('user has canceled');
              }




           else   if(data['status']=='disputed'){
               alert('transaction is disputed');
              }

              else if (data['status']=='refunded'){
               alert('you have been refunded');
              }

              else if (data['status']=='error'){
                alert('there was an error please reload ');
              }

              else if (data['status']=='created'){
                alert('waiting for user to confirm plaese reload ater pressing pin ');
              }


              else {
                alert(data['status']);
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
        20000);






    });

@endif

function  showEditModal(){


  $("#edit_modal").modal({});


  $("#edit_modal").modal("show");
}


function  showReservationReviewModal(){


$("#reservation_review_modal").modal({});


$("#reservation_review_modal").modal("show");
}


function  showCarReviewModal(){


$("#car_review_modal").modal({});


$("#car_review_modal").modal("show");
}





var editDatePicker1=$("#date_picker3").datepicker({
                minDate: '+0d',
                changeMonth: true,
                changeYear: true,

              });
var editDatePicker2=$("#date_picker4").datepicker({
                    changeMonth: true,
                    changeYear: true,

                  });


function datepicker(){


editDatePicker1.datepicker('show');
}

editDatePicker1.change(function() {

                  startDate = $(this).datepicker('getDate');
                  editDatePicker2.datepicker("option", "minDate", startDate);
              })


editDatePicker2.change(function() {

                  endDate = $(this).datepicker('getDate');

                  var diffDays = endDate.getDate() - startDate.getDate();
                  var total=diffDays*{{$reservation->car->daily_rate}};
                  var diffrence=total-{{$reservation->total_cost}}
                  $("#attribute1").text("Total $");
                  $("#total_price1").text(total);
                  if(diffrence>0){

                    $('#paragraph').text('  dollars should be added ');
                    $('#amount').text(diffrence) ;
                    $("#radio_money").show();
                    $("#the_button").text("Pay")

                  }

                  else if(diffrence<0){
                    $('#paragraph').text('  dollars have been returned to your account');
                    diffrence=Math.abs(diffrence)
                    $('#amount').text(diffrence)

                  }

                  else{

                    $('#paragraph').text('same number of days reserved');

                  }

                  $("#more_money").show();

              });









</script>


@endsection


