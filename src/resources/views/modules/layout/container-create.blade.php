
{{ Form::open(['method' => 'post', 'id' => 'form_create', 'files' => true]) }}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                @php preg_match('/detail|edit|create/ ', request()->route()->getName(), $matches) @endphp
                <h4 class="card-title mb-0">
                    {{ucfirst($module)}} Management
                    <small class="text-muted">{{ucfirst($matches[0])}} {{ucfirst($module)}}</small>
                </h4>
            </div><!--col-->
        </div>
        <hr>
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

