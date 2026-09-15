<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
<body bgcolor="MistyRose">

<h1 style="text-align:center;">This is registration page</h1>

<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table align="center" width="700" cellpadding="10">

        <tr>
            <td colspan="2" align="center">
                <h1>Student Registration Form</h1>
            </td>
        </tr>

        <tr>
            <td>Roll no. :</td>
            <td>
                <input type="text" name="roll_no" size="50" value="{{ old('roll_no') }}" required>
                @error('roll_no')
                    <div style="color:red;">{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <tr>
            <td>Student name :</td>
            <td>
                <input type="text" name="first_name" size="21" placeholder="First Name" value="{{ old('first_name') }}" required>
                -
                <input type="text" name="last_name" size="21" placeholder="Last Name" value="{{ old('last_name') }}" required>
                @error('first_name')<div style="color:red;">{{ $message }}</div>@enderror
                @error('last_name')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Father's name :</td>
            <td>
                <input type="text" name="father_name" size="50" value="{{ old('father_name') }}" required>
                @error('father_name')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Date of birth :</td>
            <td>
                <input type="text" name="dob_day" size="3" placeholder="Day" value="{{ old('dob_day') }}" > - 
                <input type="text" name="dob_month" size="3" placeholder="Month" value="{{ old('dob_month') }}" > - 
                <input type="text" name="dob_year" size="8" placeholder="Year" value="{{ old('dob_year') }}" >
                <i>(DD-MM-YYYY)</i>
                @error('dob_day')<div style="color:red;">{{ $message }}</div>@enderror
                @error('dob_month')<div style="color:red;">{{ $message }}</div>@enderror
                @error('dob_year')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Mobile no. :</td>
            <td>
                <input type="text" name="country_code" size="1" value="+91" required> -
                <input type="text" name="mobile_no" size="42" value="{{ old('mobile_no') }}" required>
                @error('mobile_no')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Email id :</td>
            <td>
                <input type="email" name="email" size="50" value="{{ old('email') }}" required>
                @error('email')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Password :</td>
            <td>
                <input type="password" name="password" size="50" required>
                @error('password')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Gender :</td>
            <td>
                <input type="radio" name="gender" value="Male" {{ old('gender')=='Male' ? 'checked' : '' }} required> Male
                <input type="radio" name="gender" value="Female" {{ old('gender')=='Female' ? 'checked' : '' }}> Female
                @error('gender')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Department :</td>
            <td>
                <select name="department" required>
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
            <td>Course :</td>
            <td>
                <select name="course" required>
                    <option value="">Select Current Course</option>
                    <option value="Python" {{ old('course')=='Python' ? 'selected' : '' }}>Python</option>
                    <option value="Node" {{ old('course')=='Node' ? 'selected' : '' }}>Node</option>
                    <option value="Java" {{ old('course')=='Java' ? 'selected' : '' }}>Java</option>
                    <option value="React" {{ old('course')=='React' ? 'selected' : '' }}>React</option>
                    <option value="PHP" {{ old('course')=='PHP' ? 'selected' : '' }}>PHP</option>
                </select>
                @error('course')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Student photo :</td>
            <td>
                <input type="file" name="photo" accept="image/*">
                @error('photo')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>City :</td>
            <td>
                <input type="text" name="city" placeholder="Enter City" size="50" value="{{ old('city') }}">
                @error('city')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td>Address :</td>
            <td>
                <textarea name="address" cols="48" rows="5">{{ old('address') }}</textarea>
                @error('address')<div style="color:red;">{{ $message }}</div>@enderror
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Register">
            </td>
        </tr>

    </table>


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
</form>

</body>
</html>
 
