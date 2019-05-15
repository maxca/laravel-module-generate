@foreach($search as $key => $item)
    @if(in_array($item['type'], ['text','radio','number']))
        <div class="col-sm-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="{{$item['icon'] ?? 'fa fa-user'}}"></i>
                </span>
                    </div>
                    @php $value = request($item['name']) @endphp
                    @if($item['type'] == 'text')
                        @include('module-generate::modules.form.input-text', ['name' => $item['name'], 'value' => $value])
                    @elseif($item['type'] == 'number')
                        @include('module-generate::modules.form.input-number', ['name' => $item['name'], 'value' => $value])
                    @elseif($item['type'] == 'radio')
                        @include('module-generate::modules.form.radio-one-input', ['name' => $item['name'] ,'value' => $item['value']])
                    @endif
                </div>
            </div>
        </div>
    @endif
@endforeach