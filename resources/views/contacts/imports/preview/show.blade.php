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
                <form action="{{ route('process-import.store') }}" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$file->id}}" />
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
                                <select id="option_{{$loop->index}}" name="option_{{$loop->index}}" data-id="{{$loop->index}}" class="form-select options"  required>
                                    <option value="">{{__('contacts.select')}}</option>
                                    @foreach($fields as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                <button type="submit" id="submit" class="btn btn-primary">{{ __('contacts.import') }}</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="{{ asset('js/send.js') }}" defer></script>
@endsection
