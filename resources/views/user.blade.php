
  <!DOCTYPE html>
<html>
    <style>
   
  
    input[type="text"], 
    input[type="password"], 
    input[type="email"], 
    select {
        padding: 5px; 
        font-size: 16px; 
        border: 2px solid #000; 
       
        margin-bottom: 2px; 
        border-radius: 5px; 
    }
    #ajaxMessage{
        display: none;
        position: relative;
        top: 20px;
        text-align: center;
        right: 20px;
        max-width: 400px;
        z-index: 1000;}
</style>
<head>
    <title>Registration Form</title>
</head>
<body >

<form  action="{{ URL::route('user.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table align="center" width="1000" cellpadding="15">
            <td colspan="2" align="center">
                <h1> Registration Form</h1>
            </td>
            {{-- <tr >id="user-row-{{ $user->id }}" --}}

        <tr>
            <td>Full Name:</td>
            <td >
               <input type="text" name="full_name" id="full_name" class="form-control" size="85" value="{{ old('full_name') }}">
                    @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
            </td>
        </tr>

        <tr>
            <td>Email :</td>
            <td>
                <input type="email" name="email" id="email" class="form-control" size="85" value="{{ old('email') }}" >
                @error('email')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>
        <tr>
            <td> Official_Email :</td>
            <td>
                <input type="email" name="official_email" id="official_email" class="form-control" size="85" value="{{ old('official_email') }}" >
                @error('official_email')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Mobile no. :</td>
            <td>
                <input type="text" name="country_code" id="country_code" class="form-control" size="1" value="+44" > -
                <input type="text" name="mobile_no" id="mobile_no" class="form-control" size="75" value="{{ old('mobile_no') }}" >
                @error('mobile_no')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>
              <tr>
            <td>Department :</td>
            <td>
                <select name="department" id="department" class="form-control" >
                    <option value="">- Select Department -</option>
                    <option value="CSE" {{ old('department')=='CSE' ? 'selected' : '' }}>CSE</option>
                    <option value="EEE" {{ old('department')=='EEE' ? 'selected' : '' }}>EEE</option>
                    <option value="CIVIL" {{ old('department')=='CIVIL' ? 'selected' : '' }}>CIVIL</option>
                    <option value="MECH" {{ old('department')=='MECH' ? 'selected' : '' }}>MECH</option>
                    <option value="BBA" {{ old('department')=='BBA' ? 'selected' : '' }}>BBA</option>
                </select>
                @error('department')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>
         <tr>
            <td>Company Name:</td>
            <td>
                <input type="text" name="company_name" id="company_name" class="form-control" size="85" value="{{ old('company_name') }}" >
                @error('company_name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </td>
        </tr>
    
         <tr>
            <td> Extension Number :</td>
            <td>
                <input type="text" name="extension_number" id="extension_number" class="form-control" size="85" value="{{ old('extension_number') }}">
                   @error('extension_number') <span class="text-danger">{{ $message }}</span> @enderror
            </td>
        </tr>   
         <tr>
            <td>Voip User Name:</td>
            <td>
                <input type="text" name="voip_user_name" id="voip_user_name" class="form-control" size="85" value="{{ old('voip_user_name') }}" >
                @error('voip_user_name')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Password :</td>
            <td>
                <input type="password" name="password" id="password" class="form-control"  size="85">
                @error('password')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

         <tr>
            <td>Responsible Person:</td>
            <td>
                <input type="text" name="responsible_person" id="responsible_person" class="form-control" size="85" value="{{ old('responsible_person') }}" >
                @error('responsible_person')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            {{-- <td>User photo :</td>
            <td>
                <input type="file" name="photo" accept="image/*">
                @error('photo')<div style="color:red;">{{ $message }}</div>@enderror
            
            </td> --}}
                <td>Upload file :</td>
             <td>
                <input type="file" name="document" accept="application/pdf/text/plain/document/*">
                @error('document')<div style="color:red;">{{ $message }}</div>@enderror
             </td>
                </tr>
         
         <tr>
            <td colspan="5" align="center" >
                
                <input type="submit" value="Submit" style="padding: 10px 30px; font-size: 20px; font-weight: bold;  cursor: pointer;">
            </td>
        </tr>
                 
    {{-- </tr> --}}
    

  


    @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </table>
</form>

  {{-- <form action="{{ URL::route('file.upload') }}" method="POST" enctype="multipart/form-data" >
    {{-- <form method="post" action="/upload" enctype="multipart/form-data"> --}}
    {{-- @csrf
    <table align="center" width="1000" cellpadding="15">
        <tr>
            <td>User photo :</td>
            <td>
                <input type="file" name="photo" accept="image/*">
                @error('photo')<div style="color:red;">{{ $message }}</div>@enderror
            
            </td>
                <td>Upload file :</td>
             <td>
                <input type="file" name="document" accept="application/pdf/text/plain/document/*">
                @error('document')<div style="color:red;">{{ $message }}</div>@enderror
             </td>
              <td>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary mt-4 w-100">Upload</button>
                                   
                                </div>
                            </td>
            </td>
        </tr>
        </table>
    </form> --}} 

<form action="{{ URL::route('user.storeuser') }}" method="POST" enctype="multipart/form-data">
{{-- <form id="userCreateForm" action="{{ URL::route('user.storeuser') }}" method="POST" onsubmit="return false;"> --}}
    @csrf
    <table align="center" width="1000" cellpadding="15">
        <tr>
            <td colspan="3" align="center">
                <h2>Create User</h2>
            </td>
        </tr>
        <tr>
            <td>
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="create_email" required>
            </td>
            <td>
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="create_password" required>
            </td>
            {{-- <td>
                <div class="mt-2">
                    <button type="button" class="btn btn-primary mt-4 w-100" style="display:none;">Create User</button>
                </div>
                <input type="hidden" name="creator_user_id" id="creator_user_id" value="">
            </td> --}}
            <td>
                                 <div class="mt-2">
                                    <button type="submit" value="submit" class="btn btn-primary mt-4 w-100">Create User</button>
                                </div>
                            </td>
        </tr>
    </table>
</form>

{{-- <div id="ajaxMessage" style="margin: 20px auto; max-width: 1000px;"></div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainForm = document.getElementById('mainUserForm');
        const createForm = document.getElementById('userCreateForm');
        const messageBox = document.getElementById('ajaxMessage');
            
        


        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        function showMessage(text, isSuccess = true) {
            Toast.fire({
                icon: isSuccess ? 'success' : 'error',
                title: text
            });
        }

        if (!mainForm || !createForm) {
            return;
        }

        mainForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const mainData = new FormData(mainForm);

            try {
                const mainResponse = await fetch(mainForm.action, {
                    method: 'POST',
                    body: mainData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (!mainResponse.ok) {
                    const errorData = await mainResponse.json();
                    if (errorData.errors) {
                        const errorMessages = Object.values(errorData.errors).flat().join('\n');
                        throw new Error('Main validation errors: ' + errorMessages);
                    }
                    throw new Error('Main user submission failed.');
                }

                const mainJson = await mainResponse.json();
                if (!mainJson.id) {
                    throw new Error('Main user id not returned.');
                }

                console.log('Main user created with ID:', mainJson.id);

                const creatorInput = document.getElementById('creator_user_id');
                if (creatorInput) {
                    creatorInput.value = mainJson.id;
                    console.log('Set creator_user_id to:', creatorInput.value);
                }

                const createData = new FormData(createForm);
                console.log('creator_user_id in FormData:', createData.get('creator_user_id'));
                const createResponse = await fetch(createForm.action, {
                    method: 'POST',
                    body: createData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });


                if (!createResponse.ok) {
                    const errorData = await createResponse.json();
                    if (errorData.errors) {
                        const errorMessages = Object.values(errorData.errors).flat().join('\n');
                        throw new Error('Validation errors: ' + errorMessages);
                    }
                    throw new Error('Create-user submission failed.');
                }

                const createJson = await createResponse.json();
                showMessage('Main user and created user were saved successfully.', true);
                mainForm.reset(); // Clear the main form
                createForm.reset(); // Clear the create form
                
            } catch (error) {
                showMessage('Submit failed: ' + error.message, false);
                console.error(error);
            }
        });
    });
</script> --}}

