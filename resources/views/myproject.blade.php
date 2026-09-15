<!doctype html>
<html lang="en">
   
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <style>
      .btn:focus,
      .btn:active,
      .btn:focus-visible {
        outline: none !important;
        box-shadow: none !important;
      }
      .btn {
        transition: none !important;
      }

 
/* Switch Container */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 28px;
}

/* Hide Default Checkbox */
.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

/* Slider Track */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0; right: 0; bottom: 0;
  background-color: #e0e0e0;
  transition: .3s;
  border-radius: 30px;
}

.slider:after {
  position: absolute;
  content: "Off";
  color: #0c0c0cfa;
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 12px;
  font-weight: bold;
}

/* Slider Circle */
.slider:before {
  position: absolute;
  content: "";
  height: 22px;
  width: 22px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: .3s;
  border-radius: 50%;
}

/* ON State Background (Image Matching Color) */
input:checked + .slider {
  background-color: #5c7cfa;
}

/* ON State Text */
input:checked + .slider:after {
  content: "On";
  color: white;
  position: absolute;
  left: 10px;
  top: 5px;
  font-size: 12px;
  font-weight: bold;
}


/* Circle Position when ON */
input:checked + .slider:before {
  transform: translateX(32px);
}











    </style>
    <title>My Project</title>
  </head>
  <body>
    
  
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-9">
                        <h2 class="text-center mt-5">My Project</h2>
                        
                    <button type="button" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add information</button>
                        
                    <input type="text" id="search" class="form-control mb-3" placeholder="Search by name, email or phone">
                    <button class="btn btn-primary mb-3" id="searchBtn">Search</button>
                    <div class="table-data">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Document</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($myprojects as   $key => $myproject)
                                        
                                    
                                    <tr>
                                        {{-- <td>{{$key+1}}</td> --}}
                                        <td>{{ $myprojects->firstItem() + $key }}</td>
                                        <td>{{$myproject->id}}</td>
                                        
                                        <td>{{$myproject->name}}</td>
                                        <td>{{$myproject->email}}</td>
                                        <td>{{$myproject->phone}}</td>
                                        <td>
                                            @if($myproject->document)
                                            <a href="{{ asset('storage/documents/'  .$myproject->document) }}" target="_blank">View Document</a>
                                            @else
                                            No document
                                            @endif
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="status-toggle" data-id="{{$myproject->id}}" {{ $myproject->status ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        
                                        <td>  
                                            <button type="button" class="btn btn-success update_myproject_form"
                                            {{-- data-bs-toggle="modal" 
                                            data-bs-target="#updateModal"  --}}
                                            data-id="{{$myproject->id}}"
                                            data-name="{{$myproject->name}}"
                                            data-email="{{$myproject->email}}"
                                            data-phone="{{$myproject->phone}}"
                                            >
                                            <i class="las la-edit"></i></button>
                                            <button type="button" class="btn btn-danger delete_information" 
                                            data-id="{{$myproject->id}}"                                                                                                                              
                                                  ><i class="las la-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             {{   $myprojects->links()}}
                       
                    </div>
                </div>
              
            </div>
            
   


      

     @include('inc.add_myproject_modal')
   
     @include('inc.myproject_js')
     @include('inc.update_myproject_modal') 
    
 
  </body>
 </html>