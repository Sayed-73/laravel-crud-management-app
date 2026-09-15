<!DOCTYPE html>
<html>
<head>
<title>College Application Form</title>
<style>
body{
    font-family: Arial;
}
.container{
    width: 900px;
    margin: auto;
    border:1px solid black;
    padding:20px;
}
h2{
    text-align:center;
}
table{
    width:100%;
    border-collapse: collapse;
}
td,th{
    border:1px solid #000;
    padding:6px;
}
.section{
    background:#e6e6e6;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="container">

<h2>COLLEGE <br> APPLICATION FOR ADMISSION</h2>

<form action="{{ route('registration.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<table>

<tr class="section">
<td colspan="4">PERSONAL INFORMATION</td>
</tr>

<tr>
    <td>Last Name</td>
    <td><input type="text" name="last_name" value="{{ old('last_name') }}"></td> <td>First Name</td>
    <td><input type="text" name="first_name" value="{{ old('first_name') }}"></td>
</tr>

<tr>
    <td>Middle Name</td>
    <td><input type="text" name="middle_name" value="{{ old('middle_name') }}"></td>
    <td>Birth Date (D-M-Y)</td>
    <td>
        <input type="text" name="dob_day" placeholder="DD" style="width:30px">
        <input type="text" name="dob_month" placeholder="MM" style="width:30px">
        <input type="text" name="dob_year" placeholder="YYYY" style="width:60px">
    </td>
</tr>

<tr>
    <td>Gender</td>
    <td>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
    </td>
    <td>Social Insurance Number</td>
    <td><input type="text" name="student_id"></td> </tr>

<tr>
<td>Social Insurance Number</td>
<td><input type="text"></td>
</tr>

<tr>
<td>Address</td>
<td colspan="3"><input type="text" style="width:100%"></td>
</tr>

<tr>
<td>City</td>
<td><input type="text"></td>
<td>Postal Code</td>
<td><input type="text"></td>
</tr>

<tr>
    <td>Email</td>
    <td><input type="email" name="email" value="{{ old('email') }}"></td>
    <td>Phone</td>
    <td><input type="text" name="phone" value="{{ old('phone') }}"></td>
</tr>

<tr class="section">
<td colspan="4">EMERGENCY CONTACT</td>
</tr>

<tr>
<td>Name</td>
<td><input type="text"></td>
<td>Relationship</td>
<td><input type="text"></td>
</tr>

<tr>
<td>Home Phone</td>
<td><input type="text"></td>
<td>Cell Phone</td>
<td><input type="text"></td>
</tr>

<tr class="section">
<td colspan="4">PROGRAM INFORMATION</td>
</tr>

<tr>
    <td>Program Applying For</td>
    <td colspan="3"><input type="text" name="program_applied" style="width:100%"></td>
</tr>

<tr>
    <td>Campus</td>
    <td colspan="3">
        <input type="radio" name="campus" value="Aurora"> Aurora  
        <input type="radio" name="campus" value="Thebacha"> Thebacha  
        <input type="radio" name="campus" value="Yellowknife"> Yellowknife
    </td>
</tr>

<tr>
    <td>Year</td>
    <td colspan="3">
        <input type="radio" name="program_year" value="1"> First <input type="radio" name="program_year" value="2"> Second
        <input type="radio" name="program_year" value="3"> Third
        <input type="radio" name="program_year" value="4"> Fourth
    </td>
</tr>

<tr>
<td colspan="4" style="text-align:center">
<button type="submit">Submit Application</button>
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
</div>

</body>
</html>