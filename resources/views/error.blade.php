@extends('layouts.app')
@section('content')
 <div class="container">
     <h1 style="margin:auto;width:100%;height:100%">Error Page</h1>
     <p>Error occured while processing your request .Please try again later</p>
     <button class="btn btn-primary" onclick="window.history.back()">Go Back</button>
 </div>
@endsection