<html>

    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->

    <head>
    <title>Update Form</title>
</head>
<body>

           
        </tr>
<form action="{{ route('user.update', $user->id) }}" method="Post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" id="update_id" name="update_id" value="put"/>
    <table align ="center" width="1000" cellpadding="15">

         <tr>
            <td colspan="2" align="center">
                <h1> Update Form</h1>
            </td>

        <tr>
            <td>Full Name:</td>
            <td >
               <input type="text" name="update_full_name" id="update_full_name" size="85" value="{{$user->full_name}}">
                   
        </tr>

        <tr>
            <td>Email :</td>
            <td>
                <input type="email" name="update_email" id="update_email" size="85" value="{{$user->email}}" >
                
            </td>
        </tr>
        <tr>
            <td> Official_Email :</td>
            <td>
                <input type="email" name="update_official_email" id="update_official_email" size="85" value="{{$user->official_email}}" >
                
            </td>
        </tr>

        <tr>
            <td>Mobile no. :</td>
            <td>
                <input type="text" name="update_country_code" id="update_country_code" size="1" value="+44" > -
                <input type="text" name="update_mobile_no" id="update_mobile_no" size="75" value="{{$user->mobile_no}}" >
                
            </td>
        </tr>
              <tr>
            <td>Department :</td>
            <td>
                <select name="update_department" id="update_department" >
                    <option value="">- Select Department -</option>
                    <option value="CSE" {{ $user->department == 'CSE' ? 'selected' : '' }}>CSE</option>
                    <option value="EEE" {{ $user->department == 'EEE' ? 'selected' : '' }}>EEE</option>
                    <option value="CIVIL" {{ $user->department == 'CIVIL' ? 'selected' : '' }}>CIVIL</option>
                    <option value="MECH" {{ $user->department == 'MECH' ? 'selected' : '' }}>MECH</option>
                    <option value="BBA" {{ $user->department == 'BBA' ? 'selected' : '' }}>BBA</option>
                </select>
                
            </td>
        </tr>
         <tr>
            <td>Company Name:</td>
            <td>
                <input type="text" name="update_company_name" id="update_company_name" size="85" value="{{$user->company_name}}" >
               
            </td>
        </tr>
    
         <tr>
            <td> Extension Number :</td>
            <td>
                <input type="text" name="update_extension_number" id="update_extension_number" size="85" value="{{$user->extension_number}}">
                  
            </td>
        </tr>   
         <tr>
            <td>Voip User Name:</td>
            <td>
                <input type="text" name="update_voip_user_name" id="update_voip_user_name" size="85" value="{{$user->voip_user_name}}" >
              
            </td>
        </tr>
        <tr>
            <td>Password :</td>
            <td>
                <input type="password" name="update_password" id="update_password" size="85" value="{{ $user->password}}">
                
            </td>
        </tr>

         <tr>
            <td>Responsible Person:</td>
            <td>
                <input type="text" name="update_responsible_person" id="update_responsible_person" size="85" value="{{$user->responsible_person}}" required>
               
            </td>
        </tr>
         <tr>
            <td colspan="5" align="center" >
                <input type="submit" value="update" style="padding: 10px 30px; font-size: 20px; font-weight: bold;  cursor: pointer;">
            </td>
        </tr>

    </table>
       @if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif


</body>
</html>