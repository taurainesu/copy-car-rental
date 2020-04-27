@extends('reports.layout')

@section('content')

    <TABLE CLASS="hdft" WIDTH="100%" CELLSPACING="0">
        <TR>
            <TH CLASS="tl">Daily Reservations Report (generated {{date('D d M Y H:i:s',time())}})</TH>
        </TR>
        <TR>
            <TD CLASS="nv">[<A HREF="#"></A>]</TD>
        </TR>
    </TABLE>

    <H3>OVERALL STATS SUMMARY</H3>
    <TABLE CLASS="it" CELLSPACING="0">
        <TR>
            <TD>total reserved:</TD>
        <TD>{{count($reservations)}}</TD>
        </TR>
       
        <TR>
            <TD>total reserved in Harare:</TD>
        <TD>{{$harare}}</TD>
        </TR>
        <TR>
            <TD>total reserved in Bulawayo:</TD>
        <TD>{{$bulawayo}}</TD>
        </TR>
        <TR>
            <TD>total reserved in Other locations:</TD>
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
            <TH>Reserved By</TH>
            <TH>Location</TH>
            <TH>Dates Reserved</TH>
        </TR>
        @foreach ($reservations as $reservation)
            <TR CLASS="o">
            <TD><A HREF="#">{{$reservation->vehicle_reg}}</A></TD>
            <TD CLASS="h">{{$reservation->brand}}</TD>
            <TD CLASS="h">{{$reservation->model}}</TD>
            <TD CLASS="h">{{$reservation->supplier_name}}</TD>
            <TD CLASS="h">{{$reservation->reserved_by}}</TD>
            <TD CLASS="h">{{$reservation->location}}</TD>
            <TD CLASS="h">{{date('d/m/Y',strtotime($reservation->pick_up_date))}}-{{date('d/m/Y',strtotime($reservation->return_date))}}</TD>
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

@section('js')
<script>

</script>
@endsection