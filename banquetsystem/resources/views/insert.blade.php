@extends('layout.default')
@section('content')
<body>
<div>&nbsp;</div>
<form class="form-horizontal" method="post" action="/insertguest">
{{ csrf_field() }}
<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Guest Name
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="guest_name" id="guest_name" value="" required>
    </div>
</div>
</div>
<div class="col-lg-10">
<div class="form-group">
    <label for="guest_num" class="col-lg-2 control-label">
       Number of Guest
    </label>
    <div class="col-lg-10">
        <input type="number" class="form-control" name="guest_num" id="guest_num" value="" min="1" max="10" required>
    </div>
</div>
</div>
<div class="col-lg-10">
<div class="form-group">
    <label for="tbl_num" class="col-lg-2 control-label">
        Table Number
    </label>
    <div class="col-lg-10">
        <select class="form-control" id="tbl_num" name="tbl_num">
  
 @foreach($tbl as $tbl_all)
  <option value="{{$tbl_all->table_num}}">{{$tbl_all->table_num}}</option>
 @endforeach
        </select>
        <font color="red">@php
        if($error!=''){
        echo($error);
    }
        @endphp
    </font>
    </div>
</div>
</div>
<div class="form-group">
&nbsp;
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Register</button>

    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</body>
@stop
