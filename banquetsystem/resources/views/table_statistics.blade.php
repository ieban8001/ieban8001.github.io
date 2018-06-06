@extends('layout.default')
@section('content')
<script type="text/javascript" src="jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery.freezeheader.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$("table table-bordered").freezeHeader({ top: true, left: true });
});

</script>
<div>&nbsp;</div>
<div class="container">
<table id="table table-bordered" class="table table-bordered">
	<thead>
		<tr class="row_class_name">
			<td class="locked_class_name">&nbsp;</td>
			<td>Attended</td>
			<td>Absent</td>
			<td>Number of Guest</td>
		</tr>
	</thead>
	<tbody>
		<?php $sumAtt=0;
			  $sumAbs=0;
			  $sumTotal=0;?>
		@foreach($tblguest as $tbl)
		<tr>
			<td><a href="/guestbytbl/{{$tbl->table_num}}" target="_blank">Table {{$tbl->table_num}}</a></td>
			<?php 
				$guest = DB::table('guest_list')->where('uid', '=', auth()->id())->where('table_num', '=', $tbl->table_num)->where('attendance', '=', 1)->sum('guest_amt');
    		?>
    		<td><?php echo $guest;$sumAtt=$sumAtt+$guest;?></td>

    		<?php 
				$guest2 = DB::table('guest_list')->where('uid', '=', auth()->id())->where('table_num', '=', $tbl->table_num)->where('attendance', '=', 0)->sum('guest_amt');
				$tbl_abs = DB::table('guest_list')->where('uid', '=', auth()->id())->where('table_num', '=', $tbl->table_num)->where('attendance', '=', 0)->get(['table_num']);
    		?>
 
    		
    		
    		<td><?php echo $guest2;$sumAbs=$sumAbs+$guest2;?></td>
    		
    		<?php 
				$guest3 = DB::table('guest_list')->where('uid', '=', auth()->id())->where('table_num', '=', $tbl->table_num)->sum('guest_amt');
    		?>
    		<td><?php echo $guest3;$sumTotal=$sumTotal+$guest3;?></td>

		</tr>
		@endforeach
		<tr>
			<td>Total Guest</td>
			<td><?php echo $sumAtt;?></td>
			<td><?php echo $sumAbs;?></td>
			<td><?php echo $sumTotal;?></td>
		</tr>
</tbody>
</table>
</div>
@stop