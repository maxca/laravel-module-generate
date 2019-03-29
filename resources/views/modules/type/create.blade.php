@extends('module-generate::modules.master')

@section('content')
    <form action="{{url('/type/store')}}" method="post">
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
                        <div class="form-group">
                            <div class="form-check-inline">
                                <input type="radio" value="input" name="type" class="form-check-input" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    input
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" value="file" name="type" class="form-check-input">
                                <label class="form-check-label" for="exampleRadios1">
                                    file
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=test">allowed input</label>
                            <select name="allowed_input" id="" class="form-control">
                                <option value="all">all</option>
                                <option value="th">th</option>
                                <option value="en">en</option>
                                <option value="number">number</option>
                                <option value="en_th">en_th</option>
                            </select>
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