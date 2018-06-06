@extends('layout.default')
@section('content')
<body>
<div>&nbsp;</div>
<form class="form-horizontal" method="post" action="/member_pointsAdd">
{{ csrf_field() }}
<div class="col-lg-10">
<div class="form-group">
    <label for="member_name" class="col-lg-2 control-label">
        Member Name :
    </label>
    <div class="col-lg-4">
        <select class="form-control" name="member_name" id="member_name" required>    @foreach($total_members as $members)
            <option value="{{$members -> id}}">{{$members -> name}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

<div class="col-lg-10" id="member2">
<div class="form-group">
    <label for="member_name2" class="col-lg-2 control-label">
        Member Under :
    </label>
    <div class="col-lg-4">
        <select class="form-control" name="member_name2" id="member_name2" required>       
            @foreach($total_members2 as $members)
            <option value="{{$members -> id}}">{{$members -> name}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>

<div class="col-lg-10">
<div class="form-group">
    <label for="points_alloc" class="col-lg-2 control-label">
        Points Allocated :
    </label>
    <div class="col-lg-4">
        <input class="form-control" type="number" min="1" id="points_alloc" name="points_alloc" required="true" />
    </div>
</div>
</div>

<div class="form-group">
&nbsp;
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</body>
<script type="text/javascript">
    $(function(){

   //$("#member_name2 option[value='" + $('#member_name').val() + "']").remove();
   $("#member_name").blur(function() {
    //alert($('#member_name').val());
    if($('#member_name').val()==$('#member_name2').val()){
        alert("Both member name and member under cannot be same");
    }
    //$("#member_name2 option[value='" + $('#member_name').val() + "']").remove();
 
});

   $("#member_name2").blur(function() {
    //alert($('#member_name').val());
    if($('#member_name').val()==$('#member_name2').val()){
        alert("Both member name and member under cannot be same");
    }
    //$("#member_name2 option[value='" + $('#member_name').val() + "']").remove();
 
});

});
</script>
@stop
