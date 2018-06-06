@extends('layout.default')
@section('content')
<div>&nbsp;</div>
<table id="guest_tbl" class="table table-hover">
	<thead class="thead-medium">
	<tr>
		
		<th>Guest Name</th>
		<th>Guest Amount</th>
		<th>Table Number</th>
		<th>Attendance</th>
		<th>&nbsp;</th>
		
	</tr>
</thead>
<tbody>
	@foreach($allguest as $guest)
	<tr>
		
		<td>{{$guest->name}}</td>
		<td>{{$guest->guest_amt}}</td>
		<td>{{$guest->table_num}}</td>
		<td>{{$guest->attendance}}</td>
	    @if($guest->attendance == 0)
		<td><a href="/chkattn/{{{$guest->id}}}" title="Guest is here!"><i class="material-icons">person</i></a></td>
		@else
		<td><a href="/delete/{{$guest->id}}" title="Remove guest!"><span title="remove guest" class="glyphicon glyphicon-remove"></span></a></td>
		@endif


		
		

	</tr>
	@endforeach
</tbody>
</table>
@stop