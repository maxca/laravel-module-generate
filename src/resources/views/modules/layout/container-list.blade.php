<div class="card">
    <div class="card-body">
        <div class="row">
            @include('module-generate::modules.components.header-list-card-info')
            @if(in_array('create', $actions))
                @include('module-generate::modules.components.link-create-button',['url' => '#'])
            @endif
        </div><!--row-->
        {!! Form::open(['method' => 'get', 'id' => 'form_search']) !!}
        <div class="row mt-2"> <!--row search-->
            @if(in_array('search', $actions))
                @include('module-generate::modules.search.master')
            @endif
        </div><!--row-->
        {!! Form::close() !!}
        <div class="row">
            @if(in_array('search', $actions))
                <div class="col-sm-6">
                    <div class="form-group form-actions">
                        <button class="btn btn-sm btn-primary" id="submit_search" type="submit" data-toggle="tooltip"
                                title="search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            @endif
            @if(in_array('export', $actions))
                <div class="{{count($actions) == 1 ? 'col-sm-12' : 'col-sm-6'}}">
                    <div class="form-group form-actions float-right">
                        <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="export">
                            <i class="fa fa-envelope"></i>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    @include('module-generate::modules.table.list-table')
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {{ $data->total() }} total items
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">

                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div>
@push('after-scripts')
    <script>
        $("#submit_search").on('click', function () {
            $("#form_search").submit();
            $('body').loading({
                stoppable: false
            });
        })
    </script>
@endpush