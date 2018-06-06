@extends('layout.default')
@section('content')
@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>
@endif
<body>
<div>&nbsp;</div>
{!! Form::open(array('url' => '/registerwed','enctype' => 'multipart/form-data')) !!}
{{ csrf_field() }}
<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Groom Name
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="groom_name" id="groom_name" value="" required>
    </div>
</div>
</div>

<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Groom Picture
    </label>
    <div class="col-lg-10">
        {!! Form::file('groom_img', array('class' => 'image')) !!}
    </div>
</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Bride Name
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="bride_name" id="bride_name" value="" required>
    </div>
</div>
</div>

<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Bride Picture
    </label>
    <div class="col-lg-10">
        {!! Form::file('bride_img', array('class' => 'image')) !!}
    </div>
</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Wedding Banquet Location
    </label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="wed_location" id="wed_location" value="" required>
    </div>
</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<div class="col-lg-10">
<div class="form-group">
    <label for="guest_name" class="col-lg-2 control-label">
        Google Map Embed
    </label>
    <div class="col-lg-10">
        <textarea class="form-control" name="wed_embed" id="wed_embed" value="" required></textarea>
    </div>
</div>
</div>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>


<div class="col-lg-10">

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
{!! Form::close() !!}
@stop
