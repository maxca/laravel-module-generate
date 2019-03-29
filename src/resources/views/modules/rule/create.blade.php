@extends('module-generate::modules.master')

@section('content')
    <form action="{{url('rule/store')}}" method="post">
        {{csrf_field()}}
        <div class="row  justify-content-center">
            <div class="col-md-8 col-md-offset-2">

                <div class="card">
                    <div class="card-header">
                        Create Rule
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for=test">rule name</label>
                            <input type="text" name="name" class="form-control" value="" placeholder="input rule name">
                        </div>
                        <div class="form-group">
                            <label for=test">alert message</label>
                            <input type="text" name="alert_message" class="form-control" value="" placeholder="input alert message">
                        </div>

                        <div class="form-group">
                            <label for=test">value</label>
                            <input type="text" name="value" class="form-control" value="" placeholder="input value">
                        </div>

                        <div class="form-group">
                            <div class="form-check-inline">
                                <input type="radio" value="normal" name="type" class="form-check-input" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    normal
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" value="custom" name="type" class="form-check-input">
                                <label class="form-check-label" for="exampleRadios1">
                                    custom
                                </label>
                            </div>
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