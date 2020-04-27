@extends('layouts.layout')

@section('content')




<div class="ui mini modal middle aligned " id="actionsmodal">
  
  <i class="close icon"></i>
  <div class="header modal_header">Delete Car</div>
  <div class="content">
    <p class="modal_text">Are you sure you want to delete this Vee</p>
    <button class="ui red button">No</button>
    <a href-="" class="ui green button yes">Yes</a>
    
  </div>



</div>



<div class="ui mini modal middle aligned " id="emailmodal">
  
  <i class="close icon"></i>
  <div class="header modal_header">Add as Administrator</div>
  <div class="content">
    <form  method="POST" action="{{route('make_admin')}}" enctype="multipart/form-data" >
    <p class="modal_text">enter  the email address </p>

      <div class="ui input fluid ">
      <input  autocomplete="on" name="email" placeholder="user@cruizautocity.com" type="email" required>
      </div>
      <div class="ui divider"></div>
    
      {{ csrf_field() }}
    <button href-="" class="ui green button yes" type="submit">ADD</button>

    </form>
    
  </div>



</div>

<div class="ui container" style="margin-top: 10px">

<div id="context1">
  <div class="ui secondary menu">
 
    <a class="item active" data-tab="first"> Vehicles</a>
 
    <a class="item " data-tab="second">Reservations</a>
    <a class="item" data-tab="third">Users</a>
  </div>
  <div class="ui tab segment active" data-tab="first">
    <div class="ui top attached tabular menu">
 
      <a class="active item" data-tab="first/a">All Vehicles</a>
      <a class=" item" data-tab="first/b"> Awaiting Approval</a>
      <a class="item" data-tab="first/c">Deleted</a>
      <a class="item" data-tab="first/d">USD Rates</a>
      <a class="item" data-tab="first/e">Daily Report</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first/a">
      <div class="ui container" style="padding:30px 0">


  <table class="ui center aligned basic table">
      <thead>

        <tr><th class="left aligned">Car Name</th>
        <th class="left aligned" >Type</th>
        <th  class="left aligned">Owner</th>
        <th class="left aligned">Status</th>
        <th class="left aligned" >Actions</th>
      </tr></thead>
      <tbody>

 @foreach ($cars as $car) 
 
        <tr>
          <td class="left aligned">{{$car->brand}}  {{$car->model}}</td>
          <td class="left aligned">{{$car->type}} </td>
          <td class="left aligned">{{ $car->user["name"]}}</td>
          <td class="left aligned">{{$car->status}}</td>
          
          <td class="left aligned">

          @if($car->status=="pending")
          <button class=" green ui icon button" data-tooltip="Approve" data-position="top left"
        onclick="showModal(&quot;cars/approve/first/b/{{$car->id}}&quot;,
                         &quot;Approve Vehicle&quot;,
                        &quot;Are you sure you want to Approve this Vehicle &quot;)"
        >
            <i class="thumbs up icon"   ></i>
</button>

<button class="red ui icon button" data-tooltip="Reject" data-position="top left"
onclick="showModal(&quot;cars/reject/first/b/{{$car->id}}&quot;,
                 &quot;Reject Vehicle&quot;,
                &quot;Are you sure you want to Reject this Vehicle &quot;)"
>
    <i class="thumbs down icon"   ></i>
</button> 


           
@endif
<a href="cars/info/{{$car->id}}"class="orange ui icon button" data-tooltip="View Vehicle" data-position="top left">
  <i class="eye icon"   ></i>
</a>  



@if($car->status!="deleted")


<button href="cars/delete/{{$car->id}}" class="grey ui icon button" data-tooltip="Delete Vehicle" data-position="top left" 
  onclick="showModal(&quot;cars/delete/first/b/{{$car->id}}&quot;,
                     &quot;Delete Vehicle&quot;,
                    &quot;Are you sure you want to Delete this Vehicle &quot;)">
        <i class="trash icon"   ></i>
</button>  
         
@endif

@if($car->status=="deleted")

<button class=" green ui icon button" data-tooltip="Restore" data-position="top left"
onclick="showModal(&quot;cars/restore/first/a/{{$car->id}}&quot;,
                         &quot;Restore Vehicle&quot;,
                        &quot;Are you sure you want to Restore this Vehicle &quot;)"
>
            <i class="recycle icon"   ></i>
</button>


@endif




        

          <a class="teal ui icon button" data-tooltip="View reservation history" data-position="top left">
              <i class="calendar icon"   ></i>
          </a>
            </td>
          </tr>
        


          @endforeach
      </tbody>
    </table>

  



</div></div>
    <div class="ui bottom attached tab segment" data-tab="first/b">
    <div class="ui container" style="padding:30px 0">


<table class="ui center aligned basic table">
    <thead>

      <tr><th class="left aligned">Car Name</th>
      <th class="left aligned" >Type</th>
      <th class="left aligned">Owner</th>
      <th class="left aligned">Status</th>
      <th class="left aligned">Actions</th>
    </tr></thead>
    <tbody>

@foreach ($cars as $car) 

@if($car->status=="pending")
      <tr>
        <td class="left aligned">{{$car->brand}}  {{$car->model}}</td>
        <td  class="left aligned">{{$car->type}} </td>
        <td class="left aligned" >{{ $car->user["name"]}}</td>
        <td  class="left aligned" >{{$car->status}}</td>
        
        <td class="left aligned">
        <button class="green ui icon button" data-tooltip="Approve" data-position="top left"
        onclick="showModal(&quot;cars/approve/first/b/{{$car->id}}&quot;,
                         &quot;Approve Vehicle&quot;,
                        &quot;Are you sure you want to Approve this Vehicle &quot;)"
        >
            <i class="thumbs up icon"   ></i>
</button>
        <button class="red ui icon button" data-tooltip="Reject" data-position="top left"
        onclick="showModal(&quot;cars/reject/first/b/{{$car->id}}&quot;,
                         &quot;Reject Vehicle&quot;,
                        &quot;Are you sure you want to Reject this Vehicle &quot;)"
        >
            <i class="thumbs down icon"   ></i>
</button>   
        <button class="orange ui icon button" data-tooltip="View Vehicle" data-position="top left">
            <i class="eye icon"   ></i>
</button>  

      <button href="cars/delete/{{$car->id}}" class="grey ui icon button" data-tooltip="Delete Vehicle" data-position="top left" 
      onclick="showModal(&quot;cars/delete/first/b/{{$car->id}}&quot;,
                         &quot;Delete Vehicle&quot;,
                        &quot;Are you sure you want to Deete this Vehicle &quot;)">
            <i class="trash icon"   ></i>
</button>  
      
          </td>
        </tr>
      
        @endif

        @endforeach
    </tbody>
  </table>





</div>
  
  
  
  </div>
    <div class="ui bottom attached tab segment" data-tab="first/c">
  
    <div class="ui container" style="padding:30px 0">


<table class="ui center aligned basic table">
    <thead>

      <tr><th class="left aligned">Car Name</th>
      <th class="left aligned" >Type</th>
      <th class="left aligned" >Owner</th>
      <th class="left aligned"  >Status</th>
      <th class="left aligned">Actions</th>
    </tr></thead>
    <tbody>

@foreach ($cars as $car)
 @if($car->status=="deleted")
      <tr>
        <td class="left aligned">{{$car->brand}}  {{$car->model}}</td>
        <td class="left aligned">{{$car->type}} </td>
        <td class="left aligned">{{ $car->user["name"]}}</td>
        <td class="left aligned" >{{$car->status}}</td>
        
        <td>
         
        <button class="orange ui icon button" data-tooltip="View Vehicle" data-position="top left">
            <i class="eye icon"   ></i>
</button>  

<button class="ui teal icon button" data-tooltip="View reservation history" data-position="top left">
            <i class="calendar icon"   ></i>
</button>

<button class=" green ui icon button" data-tooltip="Restore" data-position="top left"
onclick="showModal(&quot;cars/restore/first/c/{{$car->id}}&quot;,
                         &quot;Restore Vehicle&quot;,
                        &quot;Are you sure you want to Restore this Vehicle &quot;)"
>
            <i class="recycle icon"   ></i>
</button>  

          </td>
        </tr>
      

        @endif
        @endforeach
    </tbody>
  </table>





</div>
  
  </div>

  <div class="ui bottom attached tab segment" data-tab="first/d">
  
    <div class="ui container" style="padding:30px 0">
      <div class="ui form">
        <div class="field">
          <label>Rand against USD</label>
          <input type="number" id="rand"/>
        </div>
        <div class="field">
          <label>Bond against USD</label>
          <input type="number" id="bond"/>
        </div>
        <button onclick="updateRates()" class="ui button primary">Update Rates</button>
      </div>
    </div>
  
  </div>

  <div class="ui bottom attached tab segment" data-tab="first/e"> 
      <reports-vehicle></reports-vehicle>
  </div>

  </div>
  <div class="ui tab segment " data-tab="second">
    <div class="ui top attached tabular menu">
      <a class="item" data-tab="second/a">All Reservations</a>
      <a class="item" data-tab="second/b">Pending Reservations</a>
      <a class="item" data-tab="second/c">Confirmed Reservations</a>
      <a class="item" data-tab="second/d">Daily Report</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="second/a"> 
     <table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned">Car</th>
        <th class="left aligned" >Pick Up Date</th>
        <th class="left aligned" >Return Date</th>
        <th class="left aligned">Status</th>
        <th class="left aligned" >Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td class="left aligned">{{$reservation->pick_up_date}} </td>
          <td class="left aligned"> {{$reservation->return_date}}</td>
          <td class="positive left aligned">{{ $reservation->reservation_status}}</td>
          <td class="left aligned">
                <a  href="/reservation/view/{{$reservation->id}}"class="orange ui icon button" data-tooltip="View Reservation" data-position="top left">
                <i class="eye icon"   ></i>
                </a>  
  
@if($reservation->reservation_status=="approved_by_agent"||$reservation->reservation_status=="approved_by_owner")
                    
                <button class=" red ui icon button" data-tooltip="Cancel Reservation" data-position="top left"
                onclick="showModal(&quot;reservation/cancel/second/a/{{$reservation->id}}&quot;,
                                 &quot;Cancel Reservation&quot;,
                                &quot;Are you sure you want to Cancel this Reservation &quot;)"
                >
                    <i class="x up icon"   ></i>
        </button> 


@endif


@if($reservation->reservation_status=="pending")

                <button class=" green ui icon button" data-tooltip="Approve Reservation" data-position="top left"
                onclick="showModal(&quot;reservation/approve/second/a/{{$reservation->id}}&quot;,
                                 &quot;Approve Reservation&quot;,
                                &quot;Are you sure you want to Approve this Reservation &quot;)"
                >
                    <i class="thumbs up icon"   ></i>
        </button>


@endif

@if($reservation->reservation_status=="pending")

        <button class="red ui icon button" data-tooltip="Reject Reservation" data-position="top left"
        onclick="showModal(&quot;reservation/reject/second/a/{{$reservation->id}}&quot;,
                         &quot;Reject Reservation&quot;,
                        &quot;Are you sure you want to Reject this Reservation &quot;)"
        >
            <i class="thumbs down icon"   ></i>
</button> 
 

@endif
               
            </td>
          </tr>
 @endforeach
        </tbody>
            </table>
</div>
    <div class="ui bottom attached tab segment" data-tab="second/b"> <table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned">Car</th>
        <th class="left aligned">Pick Up Date</th>
        <th class="left aligned" >Return Date</th>
        <th class="left aligned">Status</th>
        <th class="left aligned">Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
 @if ($reservation->reservation_status == "pending" )

        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td  class="left aligned">{{$reservation->pick_up_date}} </td>
          <td  class="left aligned">{{$reservation->return_date}}</td>
          <td class="positive left aligned">{{ $reservation->reservation_status}}</td>
          <td class="left aligned" >
                <a  href="reservation/view/{{$reservation->id}}" class="orange ui icon button" data-tooltip="View Reservation" data-position="top left">
                <i class="eye icon"   ></i>
                </a>  


                <button class=" green ui icon button" data-tooltip="Approve Reservation" data-position="top left"
                onclick="showModal(&quot;reservation/approve/second/b/{{$reservation->id}}&quot;,
                                 &quot;Approve Reservation&quot;,
                                &quot;Are you sure you want to Approve this Reservation &quot;)"
                >
                    <i class="thumbs up icon"   ></i>
        </button>






        <button class="red ui icon button" data-tooltip="Reject Reservation" data-position="top left"
        onclick="showModal(&quot;reservation/reject/second/b/{{$reservation->id}}&quot;,
                         &quot;Reject Reservation&quot;,
                        &quot;Are you sure you want to Reject this Reservation &quot;)"
        >
            <i class="thumbs down icon"   ></i>
</button> 
 


               
               
            </td>
          </tr>
          @endif
 @endforeach
        </tbody>
            </table></div>

   


    <div class="ui bottom attached tab segment " data-tab="second/c">
    <table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned">Car</th>
        <th class="left aligned">Pick Up Date</th>
        <th class="left aligned" >Return Date</th>
        <th class="left aligned" >Status</th>
        <th class="left aligned" >Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
 @if ($reservation->reservation_status == "approved_by_agent"|| $reservation->reservation_status == "approved_by_owner" )
        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td class="left aligned">{{$reservation->pick_up_date}} </td>
          <td class="left aligned">{{$reservation->return_date}}</td>
          <td class="positive left aligned">{{ $reservation->reservation_status}}</td>
          <td class="left aligned" >
                <a href="/reservation/view/{{$reservation->id}}" class="orange ui icon button" data-tooltip="View Reservation" data-position="top left">
                <i class="eye icon"   ></i>
                </a>  
              


                <button class=" red ui icon button" data-tooltip="Cancel Reservation" data-position="top left"
                onclick="showModal(&quot;reservation/cancel/second/c/{{$reservation->id}}&quot;,
                                 &quot;Cancel Reservation&quot;,
                                &quot;Are you sure you want to Cancel this Reservation &quot;)"
                >
                    <i class="x up icon"   ></i>
        </button>
               
            </td>
          </tr>
          @endif
          
 @endforeach
        </tbody>
            </table></div>


            <div class="ui bottom attached tab segment" data-tab="second/d"> 
              <reports-reservation></reports-reservation>
          </div>


  </div>
  <div class="ui tab segment" data-tab="third">
    <div class="ui top attached tabular menu">
      <a class="item" data-tab="third/a">All Users</a>
      <a class="item" data-tab="third/b">Vehicle Owners</a>
      <a class="item" data-tab="third/c">Administrators</a>
    </div>
    <div class="ui bottom attached tab segment" data-tab="third/a"><table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned">Name</th>
        <th class="left aligned" >Contact Details</th>
        <th class="left aligned" >Role</th>
        <th class="left aligned">Status</th>
        <th class="left aligned">Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($users as $user) 
        <tr>
          <td class="left aligned">{{$user->name}}  </td>
          <td class="left aligned" >{{$user->phone}}  {{$user->email}} </td>


          @if($user->isadmin=1)
          <td class="left aligned">Administrator </td>
    @endif
    
    @if($user->isadmin=0)
          <td class="left aligned"> User </td>
    @endif
          
          <td class="positive left aligned">Active</td>
          <td class="left aligned">
            <button class="green ui icon button" data-tooltip="Activate Account" data-position="top left"
            onclick="showModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                             &quot;Activate Account&quot;,
                            &quot;Are you sure you want to Activate this Account &quot;)"
            >
                <i class="thumbs up icon"   ></i>
            </button>    

            <button class="red ui icon button" data-tooltip="Reject" data-position="top left"
            onclick="showModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                             &quot;Suspend Account&quot;,
                            &quot;Are you sure you want to Suspend this Account &quot;)"
            >
                <i class="thumbs down icon"   ></i>
            </button>  



            <a class="orange ui icon button" data-tooltip="View Profile" data-position="top left" >
                <i class="eye icon"   ></i>
          </a>  

           




          <a class="teal ui icon button" data-tooltip="View reservation history" data-position="top left">
              <i class="calendar icon"   ></i>
          </a>

        </td>
          </tr>



          @endforeach
      </tbody>
    </table></div>
    <div class="ui bottom attached tab segment" data-tab="third/b">
    
      <table class="ui right aligned basic table">
        <thead>
  
          <tr><th class="left aligned">Name</th>
          <th class="left aligned" >Contact Details</th>
          <th class="left aligned">Role</th>
          <th class="left aligned">Status</th>
          <th class="left aligned">Actions</th>
        </tr></thead>
        <tbody>
   @foreach ($users as $user) 
          <tr>
            <td class="left aligned">{{$user->name}}  </td>
            <td class="left aligned">{{$user->phone}}  {{$user->email}} </td>

@if($user->isadmin=1)
      <td class="left aligned" >Administrator </td>
@endif

@if($user->isadmin=0)
      <td class="left aligned">User </td>
@endif

            <td class="positive left aligned">Active</td>
            <td class="left aligned" >
              <button class="green ui icon button" data-tooltip="Activate Account" data-position="top left"
              onclick="showModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                               &quot;Activate Account&quot;,
                              &quot;Are you sure you want to Activate this Account &quot;)"
              >
                  <i class="thumbs up icon"   ></i>
              </button>    
  
              <button class="red ui icon button" data-tooltip="Reject" data-position="top left"
              onclick="showModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                               &quot;Suspend Account&quot;,
                              &quot;Are you sure you want to Suspend this Account &quot;)"
              >
                  <i class="thumbs down icon"   ></i>
              </button>  
  
  
  
              <a class="orange ui icon button" data-tooltip="View Profile" data-position="top left" >
                  <i class="eye icon"   ></i>
            </a>  
  
             
  
  
  
  
            <a class="teal ui icon button" data-tooltip="View reservation history" data-position="top left">
                <i class="calendar icon"   ></i>
            </a>
  
          </td>
            </tr>
  
  
  
            @endforeach
        </tbody>
      </table>
    
    
    
    </div>
    <div class="ui bottom attached tab segment" data-tab="third/c">
      <button class="green ui icon button" data-tooltip="Add Administrator" data-position="top left"
      onclick="emailInputModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                       &quot;Add Administrator &quot;,
                      &quot;enter email address &quot;)"
      >
          <i class="plus icon"   ></i>
      </button>  
      <table class="ui right aligned basic table">
        <thead>
  
          <tr><th class="left aligned">Name</th>
          <th class="left aligned" >Contact Details</th>
          <th class="left aligned" >Role</th>
          <th class="left aligned" >Status</th>
          <th class="left aligned" >Actions</th>
        </tr></thead>
        <tbody>
   @foreach ($users as $user) 
          <tr>
            <td class="left aligned">{{$user->name}}  </td>
            <td class="left aligned">{{$user->phone}}  {{$user->email}} </td>
     @if($user->isadmin=1)
      <td  class="left aligned">Administrator </td>
@endif

@if($user->isadmin=0)
      <td  class="left aligned">User </td>
@endif
            
            <td class="positive left aligned">Active</td>
            <td class="left aligned" >
              <button class="green ui icon button" data-tooltip="Activate Account" data-position="top left"
              onclick="showModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                               &quot;Activate Account&quot;,
                              &quot;Are you sure you want to Activate this Account &quot;)"
              >
                  <i class="thumbs up icon"   ></i>
              </button>    
  
              <button class="red ui icon button" data-tooltip="Reject" data-position="top left"
              onclick="showModal(&quot;account/activate/first/b/{{$car->id}}&quot;,
                               &quot;Suspend Account&quot;,
                              &quot;Are you sure you want to Suspend this Account &quot;)"
              >
                  <i class="thumbs down icon"   ></i>
              </button>  
  
  
  
              <a class="orange ui icon button" data-tooltip="View Profile" data-position="top left" >
                  <i class="eye icon"   ></i>
            </a>  
  
             
  
  
  
  
            <a class="teal ui icon button" data-tooltip="View reservation history" data-position="top left">
                <i class="calendar icon"   ></i>
            </a>
  
          </td>
            </tr>
  
  
  
            @endforeach
        </tbody>
      </table>
    
    
    
    
    
    
    
    
    </div>
  </div>
</div>
<div class="ui divider"></div>





</div>

@endsection


@section('javascript')

<script>

function updateRates(){
  var rand = $("#rand").val();
  var bond = $("#bond").val();

  if(rand != null && bond != null){
    $.ajax({
        url: '/rates/update',
        type: 'post',
        data: {
          'rand':rand,
          'bond':bond,
        },
        headers: {
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') //for object property name, use quoted notation shown in second
        },
        dataType: 'json',
        success: function (data) {
          //JSON.stringify(data);
            if(data.message){
              alert("Rates updated successfully");
            }

            else{
              alert("Error updating rates");
            }
        }
    });
  }
}

function getUpdates(){
  $.ajax({
        url: '/rates/get',
        type: 'post',
        headers: {
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content') //for object property name, use quoted notation shown in second
        },
        dataType: 'json',
        success: function (data) {
          //JSON.stringify(data);
          $("#rand").val(data[1].rate.replace('.0',''));
          $("#bond").val(data[0].rate.replace('.0',''));
        }
    });
}

getUpdates();





$('#context1 .menu .item').tab({ context: $('#context1'),});
$('#context2 .menu .item').tab({ context: 'parent', });

function showModal(var1,var2){
  $("#actionsmodal").modal({

  });

    $(".yes").attr("href",arguments[0]);
    $(".modal_text").text(arguments[2]);
    $(".modal_header").text(arguments[1]);
    $("#actionsmodal").modal("show");
  }

  function emailInputModal(var1,var2){
  $("#emailmodal").modal({

  });

    $(".yes").attr("href",arguments[0]);
    $(".modal_text").text(arguments[2]);
    $(".modal_header").text(arguments[1]);
    $("#emailmodal").modal("show");
  }



  @if (session('last_tab') )
  $('#context1 .menu .item').tab('change tab','{{session('last_tab')}}');
@endif
   
 

</script>

@endsection