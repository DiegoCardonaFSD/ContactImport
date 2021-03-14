@extends('layouts.app')
@section('section')
    {{__('contacts.csv_file')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contacts-import.create') }}">{{ __('contacts.return') }}</a>
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
                        <th scope="col">{{__('contacts.list.preview.value')}}</th>
                        <th scope="col">{{__('contacts.list.preview.field')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $element)
                    <tr>
                        <th>{{$element}}</th>
                        <td>
                            <select class="form-select"  required>
                                <option value="">{{__('contacts.select')}}</option>
                                @foreach($fields as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
