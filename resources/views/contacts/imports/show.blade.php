@extends('layouts.app')
@section('section')
    {{__('contacts.list.import.name')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contacts-import.index') }}">{{ __('contacts.return') }}</a>
            </div>
        </div>
    </div>
    <br>
    @include('contacts.imports.partials.file_detail')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">{{__('contacts.name')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts-import-failed.index', $file->id) }}">{{__('contacts.failed')}}</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
    @include('contacts.partials.list')

@endsection
