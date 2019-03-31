<div class="col-md-9 col-form-label">
    @foreach($checkbox as $key => $item)
        <div class="form-check checkbox">
            @include('module-generate::modules.form.checkbox-with-label')
        </div>
    @endforeach
</div>