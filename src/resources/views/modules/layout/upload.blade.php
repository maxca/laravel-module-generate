@extends('module-generate::modules.layout.master')

@include('module-generate::modules.upload.style')
@section('content')

    @include('module-generate::modules.upload.form-group-upload')

@endsection

@include('module-generate::modules.upload.script')