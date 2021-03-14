@extends('layouts.app')
@section('section')
    {{__('contacts.dashboard')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                {{__('contacts.welcome')}}
            </div>
        </div>
        <div class="col-md-2">
            <div class="d-grid gap-2 d-md-flex">
                <a class="btn btn-primary" href="{{ route('contacts-import.create') }}">{{ __('contacts.create') }}</a>
            </div>
        </div>
    </div>
@endsection
