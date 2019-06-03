@extends('module-generate::modules.master')

@section('content')
    <form action="{{url('module/update',['id'=> $data->id])}}" method="post">
        {{ csrf_field() }}
        <div class="row  justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                @include('module-generate::modules.card-update')
            </div>

        </div>
    </form>
@endsection