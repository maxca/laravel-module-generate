<table class="table">
    <thead>
    <tr>
        @foreach($columns as $column)
            <th>{{$column->name}}</th>
        @endforeach
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
{{--    {{dd($columns_name)}}--}}
    @if($data->total() != 0)
        <tr>
            @foreach($data as $key => $column)
                {{dd($column)}}
                <td>{{ $column->cate_name }}</td>
            @endforeach
            <td>
                @include('module-generate::modules.components.list-button-group')
            </td>
        </tr>
    @else
        <tr>
            <td class="text-center" colspan="{{count($columns) + 1}}">ไม่พบข้อมูล</td>
        </tr>
    @endif
    </tbody>
</table>