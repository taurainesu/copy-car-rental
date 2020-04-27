<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>Reports</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{  asset('reportMedia/css/dataTables.semanticui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{  asset('reportMedia/css/shCore.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('reportMedia/css/demo.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.semanticui.min.css')}}">

    <style type="text/css" class="init">

    .ui.selection.dropdown{
        margin-bottom: 30px;
    }

	</style>
    <script type="text/javascript" language="javascript" src="{{  asset('reportMedia/js/jquery.min.js')}}"></script>

	<script type="text/javascript" language="javascript" src="{{  asset('reportMedia/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{ asset ('reportMedia/js/dataTables.semanticui.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('reportMedia/js/jquery-ui.min.css') }}">
	<script type="text/javascript" language="javascript" src="{{ asset('reportMedia/js/semantic.min.js') }}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('reportMedia/js/shCore.js')}}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('reportMedia/js/demo.js')}}"></script>

	<script type="text/javascript" language="javascript" src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('js/buttons.semanticui.min.js')}}"></script>

	<script type="text/javascript" language="javascript" src="{{ asset('js/jszip.min.js')}}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('js/pdfmake.min.js')}}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('js/vfs_fonts.js')}}"></script>
	<script type="text/javascript" language="javascript" src="{{ asset('js/buttons.html5.min.js')}}"></script>


<script type="text/javascript" language="javascript" src="{{ asset('js/buttons.print.min.js')}}"></script>

<script type="text/javascript" language="javascript" src="{{ asset('js/buttons.colVis.min.js')}}"></script>















	<script type="text/javascript" language="javascript" class="init">


	$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( $('div.eight.column:eq(0)', table.table().container()) );
} );

	</script>
</head>
<body class="dt-example dt-example-semanticui">
	<div class="container">

<div>
        <img  src="/logo.png" width="150">
    </div>
        <h3 class="ui block header  center aligned  ">
            {{$slug}} Vehicles Registered Report (generated {{$date->toRfc850String()}})
		  </h3>

		  <table class="ui very basic collapsing celled table">
			<thead>
			  <tr><th>KPI</th>
			  <th>METRIC</th>
			</tr></thead>
			<tbody>


				<tr>
					<td>
					  <h4 class="ui image header">



						<i class="big icons">
							<i class="orange car icon"></i>
							<i class="green top left corner add icon"></i>
						  </i>


						<div class="content">
						  Total Registered

					  </div>
					</h4></td>
					<td>
					 {{ $car->count()}}
					</td>
				  </tr>

			  <tr>
				<td>
				  <h4 class="ui image header">
					<i class="big icons">
						<i class="blue user icon"></i>
						<i class="top green left corner car icon"></i>
					  </i>

					<div class="content">
					  Registered Vehicle/Registered User

				  </div>
				</h4></td>
				<td>
					<sup> {{ $car->count()}}</sup>&frasl;<sub> {{ $users->count()}}</sub>
				</td>
			  </tr>
			  <tr>
				<td>
				  <h4 class="ui image header">
					<i class="big icons">
						<i class=" teal trash icon"></i>
						<i class="green top left corner car icon"></i>
					  </i>

					<div class="content">
					  Deleted Vehicles

				  </div>
				</h4></td>
				<td>
				  {{$deleted->count()}}
				</td>
			  </tr>
			  <tr>
				<td>
				  <h4 class="ui image header">
					<i class="big icons">
						<i class="red thumbs down icon"></i>
						<i class="green top left corner car icon"></i>
					  </i>

					<div class="content">
					  Rejected Vehicles

				  </div>
				</h4></td>
				<td>
                    {{$rejected->count()}}
				</td>
			  </tr>

			</tbody>
		  </table>



		<section>

			<div class="demo-html"></div>
			<table id="example" class="ui celled table" style="width:100%">
				<thead>


					<tr>
						<th>Vehicle  Registration</th>
						<th>Brand</th>
						<th>Model</th>
						<th>Supplier Name</th>
						<th>Location</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($car as $car)
					<tr>
						<td>{{$car->vehicle_registration}}</td>
						<td>{{$car->brand}}</td>
						<td>{{$car->model}}</td>
						<td>{{$car->user->name}}</td>
						<td>{{$car->location}}</td>
					</tr>
					@endforeach
				</tfoot>
			</table>




    </section>
</div>
</body>
</html>
