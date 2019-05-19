@if(array_key_exists($name, $overrideColumn))
    {!! $overrideColumn[$name] !!}
@else

    @if($type == 'text')
        @include('module-generate::modules.form.input-text',['value' => old($name, $data->{$name} ?? null)])
    @elseif($type == 'number')
        @include('module-generate::modules.form.input-number',['value' => old($name, $data->{$name} ?? null)])
    @elseif($type == 'file')

        <div class="custom-file">
            @php $filename = old($name, $data->{$name} ?? null) @endphp
            <input type="file" name="{{$name}}" class="custom-file-input" value="{{$filename}}"
                   aria-describedby="">
            <label class="custom-file-label"
                   for="inputGroupFile01">{{$filename ?? 'Choose file' }}</label>
        </div>

    @elseif($type == 'radio')
        @php $values = getRulesValue($column->value)  @endphp
        @include('module-generate::modules.form.select-option', ['name' => $name ,'', 'values' => $values])
    @endif
@endif