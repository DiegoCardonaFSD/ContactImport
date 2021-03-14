@extends('layouts.app')
@section('section')
    {{__('contacts.import')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contacts-import.create') }}">{{ __('contacts.create') }}</a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('contacts.status') }}</th>
                        <th scope="col">{{ __('contacts.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                    <tr>
                        <th scope="row">{{ $file->id }}</th>
                        <td>{{$file->status}}</td>
                        <td>
                            <a href="{{route('contacts-import.show',  $file->id)}}">{{__('contacts.view')}}</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {!! $files->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
