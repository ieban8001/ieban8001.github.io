@extends('layout.default')
@section('content')
<head>
<style type="text/css">
	.table-summary {
	table-layout:fixed;
}

.table-summary td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}


.table-borderless tbody > tr > td  {
  border: 0;
}
  

td.summary-heading {
  font-weight: bold;
  width:40%
}

td.summary-content {
  width:60%
}
</style>
</head>
<div>&nbsp;</div>

<form class="form-horizontal" method="post" action="/guestbytbl">
 {{ csrf_field() }}
<div class="container">
      
  <div class="row">
    <div class="col-sm-5">
      <label for="tblnum">Table Number :</label>
      <select class="form-control" id="tblnum" name="tblnum">
        @foreach($tblguest as $tbl)
        <option value="{{$tbl->table_num}}" @if (old('tblnum') == $tbl->table_num) selected="selected" @endif>{{$tbl->table_num}}</option>
        @endforeach
        
      </select>
    </div>
    <div class="col-sm-5">
      <label for="attn">Attendance :</label>
      <select class="form-control" id="attn" name="attn">
      	<option value="">All</option>
        <option value="0">Absent</option>
        <option value="1">Present</option>
      </select>
    </div>
    <div class="col-sm-2">
      <label for="submit">&nbsp;</label>
      <button class="btn-primary" type="submit">Search</button>
    </div>
    
  </div>
  
</div>
</form>
<div>&nbsp;</div>
<table id="guest_tbl" class="table table-hover">
	<thead class="thead-medium">
	<tr>
		
		<th>Guest Name</th>
    <th>Guest Amount</th>
		<th>Table Number</th>
		<th>Attendance</th>
		
	</tr>
</thead>
<tbody>
	@foreach($allguest as $guest)
	<tr>
		
		<td>{{$guest->name}}</td>
    <td>{{$guest->guest_amt}}</td>
		<td>{{$guest->table_num}}</td>
    <?php if($guest->attendance == 0){
            $attn = 'absent';
          }else{
            $attn = 'present'; } ?>
		<td><?php echo $attn; ?></td>
		
		<td><a href="/delete/{{{$guest->id}}}"><span title="remove this guest" class="glyphicon glyphicon-remove"></span></a></td>
	
	</tr>
	@endforeach
</tbody>
</table>

        
        
        
       
        

	
	

@stop