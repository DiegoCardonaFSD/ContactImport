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
                    <th scope="row">{{__('contacts.list.import.id')}}</th>
                    <td>{{$file->id}}</td>
                </tr>
                <tr>
                    <th scope="row">{{__('contacts.list.import.status')}}</th>
                    <td>{{$file->status}}</td>
                </tr>
                <tr>
                    <th scope="row">{{__('contacts.list.import.file')}}</th>
                    <td>{{$file->path}}</td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
