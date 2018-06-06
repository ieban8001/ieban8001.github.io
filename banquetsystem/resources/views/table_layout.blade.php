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

{!! Form::open(array('url' => '/upload','enctype' => 'multipart/form-data')) !!}

<div>&nbsp;</div>
<div>

    <div class="col-md-4">

        {!! Form::label('tbl_amt', 'Table Amount : '); !!}

    </div>

<div class="col-md-4">

        {!! Form::number('tbl_amt'); !!}

    </div>

</div>

<div>
    <div class="col-md-4">
        &nbsp;
    </div>
    <div class="col-md-4">
        &nbsp;
    </div>

</div>

<div>

    <div class="col-md-4">

        {!! Form::file('image', array('class' => 'image')) !!}

    </div>

    <div class="col-md-4">

        <button type="submit" class="btn btn-success">Upload</button>

    </div>

</div>
{!! Form::close() !!}

@endsection      
