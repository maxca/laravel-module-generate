@foreach($search as $key => $item)
    <div class="col-sm-3">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="{{$item['icon'] ?? 'fa fa-user'}}"></i>
                </span>
                </div>
                @if($item['type'] == 'text')
                    @include('module-generate::modules.form.input-text', ['name' => $item['name']])
                @elseif($item['type'] == 'radio')
                    @include('module-generate::modules.form.radio-one-input', ['name' => $item['name'] ,'value' => $item['value']])
                @endif
            </div>
        </div>
    </div>
@endforeach