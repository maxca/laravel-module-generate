<div class="row container-fluid justify-content-md-center">
    <div class="col-md">

        {{ Form::open(['method' => 'post', 'id' => 'form_create', 'files' => true]) }}
        <div class="card">
            <div class="card-body">
                @foreach($columns as $key => $column)

                    @include('module-generate::modules.components.form-group-one-row-input-group-icon-prefix',[
                        'name' => $column['name'] , 'type' => $column->type->name,
                        'icon' => $column->icon ? $column->icon->name : 'fa fa-user'
                    ])

                @endforeach

                @component('module-generate::modules.components.form-group-button-submit') @endcomponent
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

