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
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first/a"><div class="ui container" style="padding:30px 0">


  <table class="ui center aligned basic table">
      <thead>

        <tr><th class="left aligned">Car Name</th>
        <th>Type</th>
        <th>Owner</th>
        <th>Status</th>
        <th>Actions</th>
      </tr></thead>
      <tbody>

 @foreach ($cars as $car) 
 
        <tr>
          <td class="left aligned">{{$car->brand}}  {{$car->model}}</td>
          <td >{{$car->type}} </td>
          <td >{{ $car->user["name"]}}</td>
          <td>{{$car->status}}</td>
          
          <td>

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
      <th>Type</th>
      <th>Owner</th>
      <th>Status</th>
      <th>Actions</th>
    </tr></thead>
    <tbody>

@foreach ($cars as $car) 

@if($car->status=="pending")
      <tr>
        <td class="left aligned">{{$car->brand}}  {{$car->model}}</td>
        <td >{{$car->type}} </td>
        <td >{{ $car->user["name"]}}</td>
        <td>{{$car->status}}</td>
        
        <td>
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
      <th>Type</th>
      <th>Owner</th>
      <th>Status</th>
      <th>Actions</th>
    </tr></thead>
    <tbody>

@foreach ($cars as $car)
 @if($car->status=="deleted")
      <tr>
        <td class="left aligned">{{$car->brand}}  {{$car->model}}</td>
        <td >{{$car->type}} </td>
        <td >{{ $car->user["name"]}}</td>
        <td>{{$car->status}}</td>
        
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
  </div>
  <div class="ui tab segment " data-tab="second">
    <div class="ui top attached tabular menu">
      <a class="item" data-tab="second/a">All Reservations</a>
      <a class="item" data-tab="second/b">Pending Reservations</a>
      <a class="item" data-tab="second/c">Confirmed Reservations</a>
    </div>
    <div class="ui bottom attached tab segment active" data-tab="second/a"> 
     <table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned">Car</th>
        <th>Pick Up Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td >{{$reservation->pick_up_date}} </td>
          <td>{{$reservation->return_date}}</td>
          <td class="positive">{{ $reservation->reservation_status}}</td>
          <td >
                <a  href="/reservation/view/{{$reservation->id}}"class="orange ui icon button" data-tooltip="View Reservation" data-position="top left">
                <i class="eye icon"   ></i>
                </a>  
                <div class=" red ui icon button" data-tooltip="Cancel reservation" data-position="top left">
              <i class=" x icon"   ></i>
                </div>

                <button class=" green ui icon button" data-tooltip="Approve Reservation" data-position="top left"
                onclick="showModal(&quot;reservation/approve/second/a/{{$reservation->id}}&quot;,
                                 &quot;Approve Reservation&quot;,
                                &quot;Are you sure you want to Approve this Reservation &quot;)"
                >
                    <i class="thumbs up icon"   ></i>
        </button>


        <button class="red ui icon button" data-tooltip="Reject Reservation" data-position="top left"
        onclick="showModal(&quot;reservation/reject/second/a/{{$reservation->id}}&quot;,
                         &quot;Reject Reservation&quot;,
                        &quot;Are you sure you want to Reject this Reservation &quot;)"
        >
            <i class="thumbs down icon"   ></i>
</button> 

               
            </td>
          </tr>
 @endforeach
        </tbody>
            </table>
</div>
    <div class="ui bottom attached tab segment" data-tab="second/b"> <table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned">Car</th>
        <th>Pick Up Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
 @if ($reservation->reservation_status == "pending" )

        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td >{{$reservation->pick_up_date}} </td>
          <td>{{$reservation->return_date}}</td>
          <td class="positive">{{ $reservation->reservation_status}}</td>
          <td >
                <a  href="reservation/view/{{$reservation->id}}" class="orange ui icon button" data-tooltip="View Reservation" data-position="top left">
                <i class="eye icon"   ></i>
</a>  
                <div class=" grey ui icon button" data-tooltip="Delete reservation " data-position="top left">
              <i class=" x icon"   ></i>
                </div>
               
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
        <th>Pick Up Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($reservations as $reservation) 
 @if ($reservation->reservation_status == "confirmed" )
        <tr>
          <td class="left aligned">{{$reservation->car["brand"]}}  {{$reservation->car["model"]}}</td>
          <td >{{$reservation->pick_up_date}} </td>
          <td>{{$reservation->return_date}}</td>
          <td class="positive">{{ $reservation->reservation_status}}</td>
          <td >
                <div class="ui icon button" data-tooltip="View Profile" data-position="top left">
                <i class="eye icon"   ></i>
                </div>  
                <div class=" teal ui icon button" data-tooltip="Delete reservation " data-position="top left">
              <i class=" red x icon"   ></i>
                </div>
               
            </td>
          </tr>
          @endif
          
 @endforeach
        </tbody>
            </table></div>


  </div>
  <div class="ui tab segment" data-tab="third">
    <div class="ui top attached tabular menu">
      <a class="item" data-tab="third/a">All Users</a>
      <a class="item" data-tab="third/b">Vehicle Owners</a>
      <a class="item" data-tab="third/c">Administrators</a>
    </div>
    <div class="ui bottom attached tab segment" data-tab="third/a"><table class="ui right aligned basic table">
      <thead>

        <tr><th class="left aligned"></th>
        <th >Name</th>
        <th>Contact</th>
        <th>Role</th>
        <th>Actions</th>
      </tr></thead>
      <tbody>
 @foreach ($users as $user) 
        <tr>
          <td class="left aligned">{{$user->name}}  </td>
          <td >{{$user->phone}}  {{$user->email}} </td>
    <td>Administrator </td>
          
          <td class="positive">Active</td>
          <td>
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
    <div class="ui bottom attached tab segment" data-tab="third/b">People Who own Cars</div>
    <div class="ui bottom attached tab segment" data-tab="third/c">User Admin</div>
  </div>
</div>
<div class="ui divider"></div>





</div>

@endsection


@section('javascript')

<script>
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
  @if (session('last_tab') )
  $('#context1 .menu .item').tab('change tab','{{session('last_tab')}}');
@endif
   
 

</script>

@endsection