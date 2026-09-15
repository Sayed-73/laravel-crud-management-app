<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // সঠিক ইমপোর্ট
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('student');
    }

   public function store(Request $request): RedirectResponse
{
    // ১. ভ্যালিডেশন চেক (আপনার মাইগ্রেশন এবং ব্লেড ফাইলের সাথে মিল রেখে)
    $request->validate([
        'roll_no'     => 'required|unique:student,roll_no',
        'first_name'  => 'required|string|max:255',
        'last_name'   => 'required|string|max:255',
        'father_name' => 'required|string|max:255',
        'dob_day'   => 'required|numeric',
        'dob_month' => 'required|numeric',
        'dob_year'  => 'required|numeric',
        'email'       => 'required|email|unique:student,email',
        'mobile_no'   => 'required',
        'gender'      => 'required',
        'department'  => 'required',
        'course'      => 'required',
        'city'        => 'required',
        'address'     => 'required',
        'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // ২. ডেট অফ বার্থ ফরম্যাট করা (YYYY-MM-DD)
    $dob = $request->dob_year . '-' . $request->dob_month . '-' . $request->dob_day;

    // ৩. ফটো হ্যান্ডলিং
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('student_photos', 'public');
    }

    // ৪. ডাটাবেসে সেভ করা
         Student::create([
        'roll_no'     => $request->roll_no,
        'first_name'  => $request->first_name,
        'last_name'   => $request->last_name,
        'father_name' => $request->father_name,
        // 'dob_day'     => $request->day,
        // 'dob_month'   => $request->month,
        // 'dob_year'    => $request->year,
        
        'dob'        => $dob,
        'email'       => $request->email,
        'mobile_no'   => $request->country_code . $request->mobile_no,
        'password'    => bcrypt($request->password), // পাসওয়ার্ড এনক্রিপ্ট করা
        'gender'      => $request->gender,
        'department'  => $request->department,
        'course'      => $request->course,
        'city'        => $request->city,
        'address'     => $request->address,
        'photo'       => $photoPath,
    ]);

    return back()->with('success', 'Registration Successful!');
    // return redirect('/student/view')->with('success', 'Registration Successful!');

    return redirect('/student/view');
}
// public function view(){
//     $students = student::all();
//     // echo "<pre>";
//     // print_r($students);
//     // echo"</pre>";

//     $data = compact('students');
//    return view('student-view')->with($data);
// }

// ডাটা সেভ করার ফাংশন
    // আপনার ইনসার্ট লজিক এখানে...
    
    // সেভ হওয়ার পর সরাসরি ভিউ পেজে পাঠান
    


// ডাটা দেখানোর ফাংশন
// public function view(Request $request) {

//     $search= $request['search']??"";
//     if ($search != "") {

//        $students = student::where('user_name',"=",$search)->get();
//     }else{$students = student::all();
//     }

//     return view('student-view',compact('students','search'));

//     }

public function view(Request $request) {
    // ইনপুট থেকে সার্চ কি-ওয়ার্ড নেওয়া
    $search = $request->input('search'); 

    if ($search) {
        $students = Student::where('first_name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('department', 'LIKE', "%$search%")
                    ->get();
    } else {
        $students = Student::all();
    }

    // compact এর ভেতরে 'search' ভেরিয়েবলটিও পাঠান যাতে ইনপুট বক্সে লেখাটি থেকে যায়
    return view('student-view', compact('students', 'search'));
}


}