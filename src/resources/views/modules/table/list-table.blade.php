<table class="table">
    <thead>
    <tr>
        @foreach($columns as $column)
            @if(array_key_exists($column->name , $relations))
                <th>{{ucfirst($relations[$column->name]['name'])}}</th>
            @else
                <th>{{ucfirst(genLabel($column->name))}}</th>
            @endif
        @endforeach
        @if(isset($displayTime['created_at']))
            <th class="text-center" width="18%">CreateAt</th>
        @endif
        @if(isset($displayTime['updated_at']))
            <th class="text-center" width="18%">UpdatedAt</th>
        @endif
        <th class="text-center" width="18%">Actions</th>
    </tr>
    </thead>
    <tbody>

    @if($data->total() != 0)
        @foreach($data as $key => $column)
            <tr>
                @foreach($columns_name as $k => $node)
                    @if(array_key_exists($node, $relations))
                        <td>{{ $column->{$relations[$node]['has']}->{$relations[$node]['value']} }}</td>
                    @elseif(in_array($node, $images))
                        <td><img src="{{asset($column->{$node})}}" class="rounded-left" alt="" width="80" height="80">
                        </td>
                    @else
                        <td>{{ $column->{$node} }}</td>
                    @endif

                @endforeach
                @if(isset($displayTime['created_at']))
                    <td>{{$column->created_at}}</td>
                @endif
                @if(isset($displayTime['updated_at']))
                    <td>{{$column->updated_at}}</td>
                @endif
                <td class="text-right" width="15%">
                    @include('module-generate::modules.components.list-button-group')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="text-center"
                colspan="{{count($columns) + ($displayTime ? 3 : 1)}}">{{__('alerts.notfound')}}</td>
        </tr>
    @endif

    </tbody>
</table>