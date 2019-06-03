{{--@if($type == 'textarea')--}}
{{--<div class="form-group">--}}
{{--@include('module-generate::modules.form.input-textarea', ['value' => old($name, $data->{$name} ?? null)])--}}
{{--</div>--}}
{{--@else--}}
<div class="form-group row">
    <div class="col-md-2">
        <label class="col-form-label">{{genLabel($name)}}</label>
    </div>
    <div class="col-md">
        @if($type == 'textarea')
            @include('module-generate::modules.form.input-textarea', ['value' => old($name, $data->{$name} ?? null)])
        @else
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="{{$icon ?? null}}"></i>
                    </span>
                </div>
                @include('module-generate::modules.components.form-group-sub-input-create')
            </div>
        @endif
    </div>

</div>
{{--@endif--}}




