<div class="btn-group" role="group" aria-label="User Actions">
    <a href="{{route($link_action['detail'] ,['id' => $column->id])}}" data-toggle="tooltip"
       data-placement="top" title="View" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{route($link_action['update'], ['id'=> $column->id]) }}" data-toggle="tooltip"
       data-placement="top" title="Edit" class="btn btn-primary btn-sm">
        <i class="fas fa-edit"></i>
    </a>
    <a href="{{route($link_action['delete'], ['id' => $column->id]) }}" class="btn btn-sm btn-danger" data-method="delete">
        <i class="fas fa-trash"></i>
    </a>

</div>

@push('after-scripts')
    <script>
        $(".btn-danger").on('click', function () {
            $('body').loading({
                stoppable: true
            });
        })
    </script>
@endpush