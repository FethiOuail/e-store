<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h4 class="card-title mb-4">   {{trans('message.ContactsMessages')}} </h4>
        </div>
        <div class="col-md-6">
        </div>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>#</th>
            <th> {{trans('message.Name')}}</th>
            <th> {{trans('message.Email')}}</th>
            <th> {{trans('footer.Phone')}}</th>
            <th> {{trans('message.Comment')}}</th>
            <th> {{trans('message.Date')}}</th>
        </tr>
        </thead>
        <tbody>
        @php
            $i = 1;
        @endphp
        @foreach($contacts as $contact)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->comment}}</td>
                <td>{{$contact->created_at}}</td>
            </tr>
        @endforeach


        </tbody>

    </table>
    {{$contacts->links()}}
</div>


@push('scripts')
    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>
@endpush

