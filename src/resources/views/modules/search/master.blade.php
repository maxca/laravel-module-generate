{{--{{dd($search)}}--}}
@foreach($search as $key => $item)
    @if(in_array($item['type'], ['text','radio','number']) && !in_array($item['name'], $hiddenSearch))
        <div class="col-sm-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="{{$item['icon'] ?? 'fa fa-user'}}"></i>
                </span>
                    </div>
                    @php $value = request($item['name']) @endphp
                    @if(array_key_exists($item['name'], $overrideColumn))
                        {!! $overrideColumn[$item['name']] !!}
                    @elseif($item['type'] == 'text' || $item['type'] == 'textarea' )
                        @include('module-generate::modules.form.input-text',
                        ['name' => $item['name'], 'value' => $value])
                    @elseif($item['type'] == 'number')
                        @include('module-generate::modules.form.input-number',
                         ['name' => $item['name'], 'value' => $value])
                    @elseif($item['type'] == 'radio')
                        @include('module-generate::modules.form.select-option',
                         ['name' => $item['name'] ,'value' => $value, 'values' => $item['values']])
                    @endif
                </div>
            </div>
        </div>
    @endif
@endforeach