@extends('reports.layout')
@section('content')
        <TABLE CLASS="hdft" WIDTH="100%" CELLSPACING="0">
            <TR>
                <TH CLASS="tl">Daily Vehicles Registered Report (generated {{date('D d M Y H:i:s',time())}})</TH>
            </TR>
            <TR>
                <TD CLASS="nv">[<A HREF="#"></A>]</TD>
            </TR>
        </TABLE>
    
        <H3>OVERALL STATS SUMMARY</H3>
        <TABLE CLASS="it" CELLSPACING="0">
            <TR>
                <TD>total registered:</TD>
                <TD>{{count($vehicles)}}</TD>
            </TR>
            
            <TR>
                <TD>different locations registered:</TD>
                <TD>3</TD>
            </TR>
            <TR>
                <TD>total registered in Harare:</TD>
            <TD>{{$harare}}</TD>
            </TR>
            <TR>
                <TD>total registered in Bulawayo:</TD>
            <TD>{{$bulawayo}}</TD>
            </TR>
            <TR>
                <TD>total registered in Other locations:</TD>
            <TD>{{$others}}</TD>
            </TR>
        </TABLE>
        <H3>DETAILED LIST</H3>
        <TABLE WIDTH="100%" CELLSPACING="0">
            <TR>
                <TH CLASS="f">Vehicle Registration Number</TH>
                <TH>Brand</TH>
                <TH>Model</TH>
                <TH>Supplier Name</TH>
                <TH>Location</TH>
            </TR>
            @foreach ($vehicles as $vehicle)
                <TR CLASS="o">
                <TD><A HREF="#">{{$vehicle->vehicle_reg}}</A></TD>
                <TD CLASS="h">{{$vehicle->brand}}</TD>
                <TD CLASS="h">{{$vehicle->model}}</TD>
                <TD CLASS="h">{{$vehicle->supplier}}</TD>
                <TD CLASS="h">{{$vehicle->location}}</TD>
                </TR>
            @endforeach
        
        </TABLE>
        <P></P>
        <TABLE CLASS="hdft" WIDTH="100%" CELLSPACING="0">
            <TR>
                <TD CLASS="nv">[<A HREF="#">all classes</A>]</TD>
            </TR>
            <TR>
                <TD CLASS="tl"><A HREF="#">Cruiz 1.1.0 (stable)</A> (C) Taurainesu Solutions</TD>
            </TR>
        </TABLE>
        @endsection