@extends('layouts.app')
@section('section')
    {{__('contacts.name')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contacts.index') }}">{{ __('contacts.return') }}</a>
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
                        <th scope="col">#</th>
                        <th scope="col">{{__('contacts.detail')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{__('contacts.list.id')}}</th>
                        <td>{{$contact->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.name')}}</th>
                        <td>{{$contact->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.email')}}</th>
                        <td>{{$contact->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.phone')}}</th>
                        <td>{{$contact->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.date_of_birth')}}</th>
                        <td>{{$contact->date_of_birth}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.address')}}</th>
                        <td>{{$contact->address}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.card_last_digits')}}</th>
                        <td>{{$contact->card_last_digits}}</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('contacts.list.franchise')}}</th>
                        <td>{{$contact->franchise}}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
