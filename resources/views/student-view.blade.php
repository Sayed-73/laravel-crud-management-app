 <!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container">
            <div class="table-responsive">

                <form action="{{ url('/student/view') }}" method="GET"> 
                    <div class="row m-2">
    <input type="text" name="search" placeholder="Search by Name ,Email or Department" value="{{ request('search') }}"></div>
    <button type="submit">Search</button>
</form>
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">roll_no</th>
                            <th scope="col">first_name</th>
                            <th scope="col">last_name</th>
                            <th scope="col">father_name</th>
                            <th scope="col">dob</th>
                            <th scope="col">mobile-no</th>
                            <th scope="col">email</th>
                           
                            <th scope="col">gender</th>
                            <th scope="col">department</th>
                            <th scope="col">course</th>
                            <th scope="col">photo</th>
                            <th scope="col">city</th>
                            <th scope="col">address</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr >
                            <td >{{$student->id}}</td>
                            <td>{{$student->roll_no}}</td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->dob}}</td>
                            <td>{{$student->mobile_no}}</td>
                            <td >{{$student->email}}</td>
                           
                            <td>{{$student->gender}}</td>
                            <td >{{$student->department}}</td>
                            <td>{{$student->course}}</td>
                            <td>{{$student->photo}}</td>
                            <td >{{$student->city}}</td>
                            <td>{{$student->address}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            
        </div>
    </body>
</html> 
