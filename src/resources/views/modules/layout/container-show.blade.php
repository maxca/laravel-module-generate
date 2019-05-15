<div class="row container-fluid justify-content-md-center">
    <div class="col-md-6">
        <div class="card">
            <table class="table table-striped">
                @foreach($data->toArray() as $key => $item)
                    <tr>
                        <td class="border-right">{{ucfirst($key)}}</td>
                        @if(in_array($key ,$images))
                            <td><img src="{{asset($item)}}" class="img-thumbnail" alt=""></td>
                        @else
                            <td>{{$item}}</td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>

