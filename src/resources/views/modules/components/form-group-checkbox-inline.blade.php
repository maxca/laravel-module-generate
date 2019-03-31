<div class="col-md-9 col-form-label">
    @foreach($checkbox as $key => $item)
        <div class="form-check form-check-inline mr-1">
            @include('module-generate::modules.form.checkbox-with-label')
        </div>
    @endforeach
</div>