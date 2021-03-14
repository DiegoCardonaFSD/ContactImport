@extends('layouts.app')
@section('section')
    {{__('contacts.list.failed.record_failed')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contacts-import-failed.index', $failed_contact->file_id) }}">{{ __('contacts.return') }}</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">{{__('contacts.detail')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{__('contacts.list.failed.row')}}</th>
                        <td>{{$failed_contact->row}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.failed.record')}}</th>
                        <td>{{$failed_contact->record}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.failed.messages')}}</th>
                        <td>
                            <ul class="list-group">
                                @foreach($failed_contact->messages as $message)
                                <li class="list-group-item">{{ $message }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
