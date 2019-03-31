{{--<div class="card">--}}
{{--<div class="card-body">--}}
{{--<div class="row">--}}
{{--@include('module-generate::modules.components.header-list-card-info')--}}
{{--@if(in_array('create', $actions))--}}
{{--@include('module-generate::modules.components.link-create-button',['url' => '#'])--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<div class="row container-fluid justify-content-md-center">
    <div class="col-md-6">
        {{ Form::open(['route' => $module.'.store' ,'method' => 'post']) }}
            <div class="card">
                <div class="card-body">
                    @foreach($columns as $key => $column)
                        @component('module-generate::modules.components.form-group-one-row-input-group-icon-prefix',['name' => $column['name']]) @endcomponent
                    @endforeach

                    @component('module-generate::modules.components.form-group-button-submit') @endcomponent
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>

