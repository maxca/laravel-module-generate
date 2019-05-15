
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text">
        <i class="{{$icon ?? null}}"></i>
        </span>
        </div>
        @if($type == 'text')
            @include('module-generate::modules.form.input-text',['value' => old($name, $data->{$name} ?? null)])
        @elseif($type == 'number')
            @include('module-generate::modules.form.input-number',['value' => old($name, $data->{$name} ?? null)])
        @elseif($type == 'file')

            <div class="custom-file">
                @php $filename = old($name, $data->{$name} ?? null) @endphp
                <input type="file" name="{{$name}}" class="custom-file-input" value="{{$filename}}"
                       aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">{{$filename ?? 'Choose file' }}</label>
            </div>

        @elseif($type == '')

        @endif

    </div>

</div>




