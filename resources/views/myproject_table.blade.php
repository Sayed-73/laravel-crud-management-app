<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Document</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($myprojects as $key => $myproject)
        <tr>
            <td>{{ $myprojects->firstItem() + $key }}</td>
            <td>{{$myproject->id}}</td>
            <td>{{$myproject->name}}</td>
            <td>{{$myproject->email}}</td>
            <td>{{$myproject->phone}}</td>
            <td>
                @if($myproject->document)
                <a href="{{ asset('storage/documents/'.$myproject->document) }}" target="_blank">View Document</a>
                @else
                No document
                @endif
            <td>  
                <a href="" class="btn btn-success update_myproject_form"
                data-bs-toggle="modal" 
                data-bs-target="#updateModal" 
                data-id="{{$myproject->id}}"
                data-name="{{$myproject->name}}"
                data-email="{{$myproject->email}}"
                data-phone="{{$myproject->phone}}"
                >
                <i class="las la-edit"></i></a>
                <a href="" class="btn btn-danger delete_information" 
                data-id="{{$myproject->id}}"
                ><i class="las la-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $myprojects->links() }}
