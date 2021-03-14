@extends('layouts.app')
@section('section')
    {{__('contacts.name')}}
@endsection
@section('content')
    @include('contacts.partials.list')
@endsection
