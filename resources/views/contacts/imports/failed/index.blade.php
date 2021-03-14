@extends('layouts.app')
@section('section')
    {{__('contacts.list.import.name')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contacts-import.show', $file->id) }}">{{ __('contacts.return') }}</a>
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
                    <a class="nav-link" aria-current="page">{{__('contacts.name')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('contacts-import.show', $file->id) }}">{{__('contacts.failed')}}</a>
                </li>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">{{__('contacts.list.failed.row')}}</th>
                        <th scope="col">{{ __('contacts.list.name') }}</th>
                        <th scope="col">{{ __('contacts.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($failed_contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->row }}</th>
                            <td>{{$contact->record}}</td>
                            <td>
                                <a href="{{route('contacts-import-failed.show', $contact)}}">{{__('contacts.view')}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {!! $failed_contacts->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
