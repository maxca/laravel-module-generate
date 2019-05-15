<table class="table">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th>{{ucfirst($column->name)}}</th>
        @endforeach
        <th class="text-center" width="18%">Actions</th>
    </tr>
    </thead>
    <tbody>

    @if($data->total() != 0)
        @foreach($data as $key => $column)
            <tr>
                @foreach($columns_name as $k => $node)
                    @if(in_array($node, $images))
                        <td><img src="{{asset($column->{$node})}}" class="rounded-left" alt="" width="80" height="80"></td>
                    @else
                        <td>{{ $column->{$node} }}</td>
                    @endif

                @endforeach
                <td class="text-right" width="15%">
                    @include('module-generate::modules.components.list-button-group')
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="text-center" colspan="{{count($columns) + 1}}">ไม่พบข้อมูล</td>
        </tr>
    @endif

    </tbody>
</table>