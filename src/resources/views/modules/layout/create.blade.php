@extends('module-generate::modules.layout.master')

@section('content')

    @include('module-generate::modules.layout.container-create')



@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#form_create").validate({
                rules:  @json($rules),
                messages: @json($messages),
                errorClass: 'invalid-feedback',
                validClass: 'is-valid',
                errorElement: 'div',
                invalidHandler: function (e, validator) {

                },
                errorPlacement: function (error, element) {
                    var input = element.attr('name');
                    error.insertAfter(element);
                },
                errorLabelContainer: '.invalid-feedback',
                highlight: function (element, errorClass, validClass) {

                },
                unhighlight: function (element, errorClass, validClass) {
                    // $(element).parents("div.form-group").removeClass(errorClass).addClass(validClass);
                },
                submitHandler: function (form) {
                    $(form).submit();
                }
            });

            $('#form_create').on('keyup blur', function () { // fires on every keyup & blur
                if ($('#ccSelectForm').valid()) {                   // checks form for validity
                    $('button.btn').prop('disabled', false);        // enables button
                } else {
                    $('button.btn').prop('disabled', 'disabled');   // disables button
                }
            });
        })

    </script>
@endpush