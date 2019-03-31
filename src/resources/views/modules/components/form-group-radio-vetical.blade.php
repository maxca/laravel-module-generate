<div class="col-md-9 col-form-label">
    @foreach($radio as $key => $item)
        <div class="form-check form-check-inline mr-1">
            @include('module-generate::modules.form.radio-with-label')
        </div>
    @endforeach
</div>