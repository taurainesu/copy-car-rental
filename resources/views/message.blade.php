@extends('layouts.layout')    
@section('content')

<meta name="csrf-token" content="{{csrf_token()}}">

                                                                                     
<div id = 'msg'>This message will be replaced using Ajax.  Click the button to replace the message.</div> 
                <button onclick="getMessage()">ClickMessage</button>

                @endsection
                @section('javascript')

<script>       
                     function getMessage() { 

                       $.ajaxSetup({
                        headers:{
                               'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                         }     });
                    

$.ajax(
        {type:'POST',
        url:'/getmsg',
        data:{
            name:'paul'
        },
        dataType:'json',
        success:function(data){
          console.log(data['msg']);
        },
        error:function(){
        console.log("failed") ;           
        },

        complete:function(){
        console.log("complete") ;           
        }

        
        }
      );}
      
      
      
      </script> 


@endsection