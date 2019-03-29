<div class="form-group">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" name="{{$name}}" aria-label="Checkbox for following text input" {{$checked ?? null}}>
            </div>
        </div>
        <input type="text" class="form-control" name="{{$text_name}}" aria-label="Text input with checkbox" placeholder="{{$placeholder}}">
    </div>
</div>