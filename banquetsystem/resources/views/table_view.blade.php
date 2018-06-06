@extends('layout.default')
@section('content')

<form action="/tbl_layoutDelete" method="get">
<div class="panel-body">
              @foreach($tbl_view as $view)
              <img src="uploads/{{$view->layout_filename}}" width="500" height="400"></img>
              <div>&nbsp;</div>
              <div class="panel-footer">
              updated as of {{ $view->updated_at }}
            </div>
            <button type="submit" class="btn btn-warning">Replace Layout</button>
            @endforeach
            </div>
</form>


@endsection      
