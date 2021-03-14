@extends('layouts.app')
@section('section')
    {{ __('contacts.csv_import') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Import Excel</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if (isset($errors) && $errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif

                                @if (session()->has('failures'))

                                    <table class="table table-danger">
                                        <tr>
                                            <th>Row</th>
                                            <th>Attribute</th>
                                            <th>Errors</th>
                                            <th>Value</th>
                                        </tr>

                                        @foreach (session()->get('failures') as $validation)
                                            <tr>
                                                <td>{{ $validation->row() }}</td>
                                                <td>{{ $validation->attribute() }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($validation->errors() as $e)
                                                            <li>{{ $e }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    {{ $validation->values()[$validation->attribute()] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>

                                @endif

                                <form action="{{ route('contacts-import.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-3">
                                            {{ __('contacts.csv_file') }}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <input type="file" name="file" />

                                                <button type="submit" id="submit" class="btn btn-primary">{{ __('contacts.import') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/send.js') }}" defer></script>
@endsection
