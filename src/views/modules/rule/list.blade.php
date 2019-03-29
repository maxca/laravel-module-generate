@extends('modules.master')

@section('content')
    <div class="row">
        <a href="{{url('rule/create')}}" class="btn btn-sm btn-success"> create</a>
    </div>
    <div class="row  justify-content-center">

        <table class="table table-responsive-sm table-bordered">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>alert message</th>
                <th>value</th>
                <th>type</th>
                <th>status</th>
                <th>action</th>
            </tr>
            @foreach($data as $key =>  $item)
                <tr>
                    <td>{{++ $key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->alert_message}}</td>
                    <td>{{$item->value}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('rule.delete',['id' => $item->id])}}" class="btn btn-sm btn-danger"> delete</a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
@endsection