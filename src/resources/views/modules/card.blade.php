<div class="card">
    <div class="card-header">
        Module information
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for=test">Module name</label>
            <input type="text" name="name" class="form-control" value="" placeholder="input module name">
        </div>
        <div class="form-group">
            <label for=test">Module key</label>
            <input type="text" name="module_key" class="form-control" value="" placeholder="input module key">
        </div>
        <div class="form-group">
            <div class="form-check-inline">
                <input type="radio" value="active" name="status" class="form-check-input" checked>
                <label class="form-check-label" for="exampleRadios1">
                    active
                </label>
            </div>
            <div class="form-check-inline">
                <input type="radio" value="inactive" name="status" class="form-check-input">
                <label class="form-check-label" for="exampleRadios1">
                    inactive
                </label>
            </div>

        </div>
    </div>
    <div class="card-footer"></div>
</div>

<div class="card align-top" style="margin-top: 20px">
    <div class="card-header">
        Action
    </div>
    <div class="card-body">
        @include('module-generate::modules.component.checkbox-text',[
            'name' => 'create','checked' => 'checked' ,
            'text_name' => 'create_link' ,
            'placeholder' => 'action create link'
        ])
        @include('module-generate::modules.component.checkbox-text',[
            'name' => 'update','checked' => 'checked' ,
            'text_name' => 'update_link' ,
            'placeholder' => 'action update link'
        ])
        @include('module-generate::modules.component.checkbox-text',[
            'name' => 'delete','checked' => 'checked' ,
            'text_name' => 'delete_link' ,
            'placeholder' => 'action delete link'
        ])
        @include('module-generate::modules.component.checkbox-text',[
            'name' => 'detail','checked' => 'checked' ,
            'text_name' => 'detail_link' ,
            'placeholder' => 'action detail link'
        ])
        @include('module-generate::modules.component.checkbox-text',[
            'name' => 'export','checked' => 'checked' ,
            'text_name' => 'export_link' ,
            'placeholder' => 'action export link'
        ])
        @include('module-generate::modules.component.checkbox-text',[
            'name' => 'search','checked' => 'checked' ,
            'text_name' => 'search_link' ,
            'placeholder' => 'action search link'
        ])
    </div>
    <div class="card-footer"></div>
</div>

<div class="card align-top" style="margin-top: 20px">
    <div class="card-header">
        Columns
    </div>
    <div class="card-body" id="column-node">
        <div class="form-group add-column">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="hidden" name="search_column[]" class="hide-search-column" value="active">
                        <input type="checkbox" class="check-search" checked>
                    </div>
                </div>
                <input type="text" name="column_name[]" class="form-control" placeholder="name">
                {!! $selectIcon !!}
                <input type="text" name="key[]" class="form-control" placeholder="key">

                <div class="input-group-append">
                    <button class="btn btn-outline-secondary add-row" type="button" id="button-addon2">Add</button>
                </div>

            </div>
            <div class="input-group mb-3">
                {!! $selectInputType !!}
                <input type="text" name="value[]" class="form-control"  placeholder="value , comma to split">
                <input type="text" name="label[]" class="form-control"  placeholder="label">
            </div>
            <div class="input-group mb-3 rule-row" id="append-rule">
                {!! $selectRule !!}
                <input type="text" name="rule_value[0][]" data-name="rule" class="form-control rule-name" placeholder="value">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary add-rule" type="button" id="button-addon2">Add Rule
                    </button>
                </div>
            </div>
        </div> <!-- end add-column -->
        <hr>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <button type="submit" class="btn btn-sm btn-success">
                save
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        reloadIndex();
        let column = ' <div class="form-group add-column">\n' +
            '            <div class="input-group mb-3">\n' +
            '                <div class="input-group-prepend">\n' +
            '                    <div class="input-group-text">\n' +
            '                        <input type="hidden" name="search_column[]" class="hide-search-column" value="active">\n' +
            '                        <input type="checkbox" class="check-search" checked>' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <input type="text" name="column_name[]" class="form-control" placeholder="name">\n' +
            '                {!! $selectIcon !!}\n' +
            '                <input type="text" name="key[]" class="form-control" placeholder="key">\n' +
            '                <div class="input-group-append">\n' +
            '                    <button class="btn btn-outline-secondary add-row" type="button" id="button-addon2">Add</button>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '            <div class="input-group mb-3">\n' +
            '                {!! $selectInputType !!}\n' +
            '                <input type="text" name="value[]" class="form-control"  placeholder="value , comma to split">\n' +
            '            </div>\n' +
            '            <div class="input-group mb-3 rule-row" id="append-rule">\n' +
            '                {!! $selectRule !!}\n' +
            '                <input type="text" name="rule_value[][]" data-name="rule" class="form-control rule-name" placeholder="value">\n' +
            '                <div class="input-group-append">\n' +
            '                    <button class="btn btn-outline-secondary add-rule" type="button" id="button-addon2">Add Rule\n' +
            '                    </button>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div> <!-- end add-column --> ' +
            '       <hr>'
        $('body').on('click', '.add-rule', function () {
            $(this).parent().parent().clone().insertAfter($(this).parent().parent());
            reloadIndex();
        })
        $('body').on('click', '.add-row', function () {
            $(column).appendTo('#column-node');
            reloadItem();
            reloadIndex();
        })


        function reloadItem() {
            $.each($('.add-row'), function (key, item) {
                console.log(key);
                console.log(item);
                if (key != 0) {
                    $(item).removeClass('add-row');
                    $(item).addClass('rem-row');
                    $(item).text('Del')
                }
            });
        }
        
        function reloadIndex() {
            $.each($('.add-column'), function (key ,item) {
                let select = $(this).find('.select-rule');
                let ruleName = $(this).find('.rule-name');
                select.attr('name' ,'rule[' + key + '][]');
                ruleName.attr('name' ,'rule_value[' + key + '][]');
            })
        }

        $('body').on('click', '.rem-row', function () {
            $(this).parent().parent().parent().remove();
        })

        function findParent(element, className) {
            return $(element).parent().parent().parent();
        }
        $('body').on('click','.check-search', function () {
            let input = $(this).parent().find('.hide-search-column');
            if(input.val() == 'active') {
                input.val('inactive')
            } else {
                input.val('active')
            }
        })

    </script>

@endpush