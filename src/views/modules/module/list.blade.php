@extends('modules.master')

@section('content')
    <div class="row">
        <a href="{{url('module/create')}}" class="btn btn-sm btn-success"> create</a>
    </div>
    <div class="row  justify-content-center">

        <table class="table table-responsive-sm table-bordered">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>status</th>
                <th>action</th>
            </tr>
            @foreach($data as $key =>  $item)
                <tr>
                    <td>{{++ $key}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('rule.delete',['id' => $item->id])}}" class="btn btn-sm btn-danger"> delete</a>
                        <a href="{{route('module.json', ['id' => $item->id])}}" target="_blank" class="btn btn-sm btn-primary"> json</a>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
@endsection