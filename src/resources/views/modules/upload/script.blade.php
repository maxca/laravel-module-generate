@push('after-scripts')
    <script src="{{cdn('js/plugins/piexif.js')}}" type="text/javascript"></script>
    <script src="{{cdn('js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{cdn('js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{cdn('js/locales/fr.js')}}" type="text/javascript"></script>
    <script src="{{cdn('js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{cdn('themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{cdn('themes/explorer-fas/theme.js')}}" type="text/javascript"></script>
    <script>

        $('#file-2').fileinput({
            theme: 'fas',
            uploadUrl: '{{url('api/v1/galleries')}}',
            deleteUrl: '#',
            showUpload: true,
            showErrorLog: true,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            initialPreview: [],
            initialPreviewConfig: [],
            errors: function (event, data) {
                console.log(event)
                console.log(data)
            },
            uploadExtraData: function () {  // callback example
                return {
                    'topic': $("#topic").val(),
                    '_token': '{{csrf_token()}}'
                }
            }

        });

        $("#file-3").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                "http://lorempixel.com/1920/1080/transport/1",
                "http://lorempixel.com/1920/1080/transport/2",
                "http://lorempixel.com/1920/1080/transport/3"
            ],
            initialPreviewConfig: [
                {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                {caption: "transport-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
            ]
        });
        $("#file-4").fileinput({
            theme: 'fas',
            uploadExtraData: {kvId: '10'}
        });
        $(".btn-warning").on('click', function () {
            var $el = $("#file-4");
            if ($el.attr('disabled')) {
                $el.fileinput('enable');
            } else {
                $el.fileinput('disable');
            }
        });
        $(".btn-info").on('click', function () {
            $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
        });
        /*
         $('#file-4').on('fileselectnone', function() {
         alert('Huh! You selected no files.');
         });
         $('#file-4').on('filebrowse', function() {
         alert('File browse clicked for #file-4');
         });
         */
        $(document).ready(function () {
            $("#test-upload").fileinput({
                'theme': 'fas',
                'showPreview': false,
                'allowedFileExtensions': ['jpg', 'png', 'gif'],
                'elErrorContainer': '#errorBlock'
            });
            $("#kv-explorer").fileinput({
                'theme': 'explorer-fas',
                'uploadUrl': '#',
                overwriteInitial: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "http://lorempixel.com/1920/1080/nature/1",
                    "http://lorempixel.com/1920/1080/nature/2",
                    "http://lorempixel.com/1920/1080/nature/3"
                ],
                initialPreviewConfig: [
                    {caption: "nature-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1},
                    {caption: "nature-2.jpg", size: 872378, width: "120px", url: "{$url}", key: 2},
                    {caption: "nature-3.jpg", size: 632762, width: "120px", url: "{$url}", key: 3}
                ]
            });
            /*
             $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
             alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
             });
             */
        });
    </script>
@endpush