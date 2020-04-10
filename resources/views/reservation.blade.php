@extends('layouts.layout')
@section('content')
<meta name="csrf-token" content="{{csrf_token()}}">
<div class="ui container">



  <div class="ui tiny modal middle aligned " id="edit_modal" style="display:none">
    <i class="close icon"></i>
            <div class="header">Update  Reservation</div>
            <div class="content">
            <form form method="POST" action="{{route('update_reservation',$reservation->id)}}" enctype="multipart/form-data" >
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





<div class="four column centered row">
    <div class="column">

    <div class="ui unstackable  centered steps">
  <div class="step">
    <i class="car icon"></i>
    <div class="content">
      <div class="title">Reservation</div>
      <div class="description">You have made a reservation from {{$reservation->pick_up_date}} to {{$reservation->return_date}}</div>
    </div>
  </div>
  <div class="active step">
    <i class="dollar icon"></i>
    <div class="content">
      <div class="title">Payment Status</div>
      <div class="description">{{$reservation->payment->status}}</div>
    </div>
  </div>
  <div class="disabled step">
    <i class="info circle icon"></i>
    <div class="content">
      <div class="title">Confirmation status</div>
      <div class="description">Awaiting confirmation from owner</div>
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
   

    <button href="cars/delete/{{$reservation->car->id}}" class="ui green icon button" data-tooltip="Edit Reservation" data-position="top left" onclick="showEditModal()">
            <i class="pencil alternate icon"   style="cotlor:#ffffff"></i>
</button>  


    <button href="cars/delete/{{$reservation->car->id}}" class="ui red icon button" data-tooltip="Cancel Reservation" data-position="top left" 
      onclick="showModal(&quot;cars/delete/first/b/{{$reservation->car->id}}&quot;,
                         &quot;Cancel Reservation&quot;,
                        &quot;Are you sure you want to Cancel this Reservation &quot;)">
            <i class="x icon"   style="color:#ffffff"></i>
</button>  
  <button href="cars/delete/{{$reservation->car->id}}" class="ui orange icon button" data-tooltip=" Pay for reservation" data-position="top left" 
    onclick="showModal(&quot;cars/delete/first/b/{{$reservation->car->id}}&quot;,
                       &quot;Reservation&quot;,
                      &quot;Pay for Reservation&quot;)">
          <i class="dollar sign icon"   style="color:#ffffff"></i>
</button>  

    <button href="cars/delete/{{$reservation->car->id}}" class="ui green icon button" data-tooltip="Approve Reservation" data-position="top left" 
      onclick="showModal(&quot;cars/delete/first/b/{{$reservation->car->id}}&quot;,
                         &quot;Delete Vehicle&quot;,
                        &quot;Are you sure you want to Approve this Reservation &quot;)">
            <i class="thumbs up icon"   style="color:#ffffff"></i>
</button>  




</button>  

<button href="cars/delete/{{$reservation->car->id}}" class="ui red icon button" data-tooltip="Decline Reservation" data-position="top left" 
  onclick="showModal(&quot;cars/delete/first/b/{{$reservation->car->id}}&quot;,
                     &quot;Delete Vehicle&quot;,
                    &quot;Are you sure you want to Decline this Reservation &quot;)">
        <i class="thumbs down icon"   style="color:#ffffff"></i>
</button>  

<button href="cars/delete/{{$reservation->car->id}}" class="ui green icon button" data-tooltip="Delete Reservation" data-position="top left" 
  onclick="showModal(&quot;cars/delete/first/b/{{$reservation->car->id}}&quot;,
                     &quot;Edit Reservation &quot;,
                    &quot;Are you sure you want to Delete this Vehicle &quot;)">
        <i class="trash alternate icon"   style="cotlor:#ffffff"></i>
</button> 
      
    
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
                alert('somethin is wrong with your network');
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


