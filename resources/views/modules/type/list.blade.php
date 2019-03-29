@extends('module-generate::modules.master')

@section('content')
    <div class="row">
        <a href="{{url('type/create')}}" class="btn btn-sm btn-success"> create</a>
    </div>
    <div class="row  justify-content-center">

        <table class="table table-responsive-sm table-bordered">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>allowed_input</th>
                <th>type</th>
                <th>status</th>
                <th>action</th>
            </tr>
            @foreach($data as $key =>  $item)
                <tr>
                    <td>{{++ $key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->allowed_input}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('type.delete', ['id' => $item->id])}}" class="btn btn-sm btn-danger"> delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
@endsection