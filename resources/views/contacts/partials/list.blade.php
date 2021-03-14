<div class="row">
    <div class="col-md-12">
        <div class="container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{__('contacts.list.id')}}</th>
                    <th scope="col">{{ __('contacts.list.name') }}</th>
                    <th scope="col">{{ __('contacts.list.email') }}</th>
                    <th scope="col">{{ __('contacts.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>
                            <a href="{{route('contacts.show', $contact)}}">{{__('contacts.view')}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="d-flex justify-content-center">
                {!! $contacts->links() !!}
            </div>
        </div>
    </div>
</div>
