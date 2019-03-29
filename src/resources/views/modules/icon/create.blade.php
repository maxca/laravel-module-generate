@extends('module-generate::modules.master')

@section('content')
    <form action="{{url('/icon/store')}}" method="post">
        {{csrf_field()}}
        <div class="row  justify-content-center">
            <div class="col-md-8 col-md-offset-2">

                <div class="card">
                    <div class="card-header">
                        Create Type
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=test">Name</label>
                            <input type="text" name="name" class="form-control" value="" placeholder="input type name">
                        </div>
                        @component('module-generate::modules.component.status-active-inactive') @endcomponent

                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-success">
                                save
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection