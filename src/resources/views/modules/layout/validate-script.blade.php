@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#form_create").validate({
                rules:  @json($rules),
                {{--messages: @json($messages),--}}
                errorClass: 'invalid-feedback',
                validClass: 'is-valid',
                errorElement: 'div',
                invalidHandler: function (e, validator) {

                },
                errorPlacement: function (error, element) {
                    let type = element.attr('type');
                    if(type == 'file') {
                        error.insertAfter($(element).parent());
                    } else {
                        error.insertAfter(element);
                    }

                },
                errorLabelContainer: '.invalid-feedback',
                highlight: function (element, errorClass, validClass) {

                },
                unhighlight: function (element, errorClass, validClass) {
                    // $(element).parents("div.form-group").removeClass(errorClass).addClass(validClass);
                },
                submitHandler: function (form) {
                    $("#form_create")[0].submit();
                    $('body').loading({
                        stoppable: false
                    });
                }
            });
            //
            // $('#form_create').on('keyup blur', function () { // fires on every keyup & blur
            //     if ($('#ccSelectForm').valid()) {                   // checks form for validity
            //         $('button.btn').prop('disabled', false);        // enables button
            //     } else {
            //         $('button.btn').prop('disabled', 'disabled');   // disables button
            //     }
            // });

            $("input[type=file]").change(function () {

                var fieldVal = $(this).val();

                // Change the node's value by removing the fake path (Chrome)
                fieldVal = fieldVal.replace("C:\\fakepath\\", "");

                if (fieldVal != undefined || fieldVal != "") {
                    $(this).next(".custom-file-label").text(fieldVal);
                }

            });
        })

    </script>
@endpush