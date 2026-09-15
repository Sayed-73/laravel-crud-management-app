<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;


class RegistrationController extends Controller
{
    public function index() {
        return view('registration');
    }

    public function store(Request $request):RedirectResponse
 {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:registration',
            'dob_day'    => 'required',
            'dob_month'  => 'required',
            'dob_year'   => 'required',
        ]);

        // ৩টি ইনপুট থেকে ১টি ডেট তৈরি করা
        $dob = $request->dob_year . '-' . $request->dob_month . '-' . $request->dob_day;

        Registration::create([
            'student_id'      => $request->student_id,
            'first_name'      => $request->first_name,
            'middle_name'     => $request->middle_name,
            'last_name'       => $request->last_name,
            'gender'          => $request->gender,
            'dob'             => $dob,
            'email'           => $request->email,
            'phone'           => $request->phone,
            'program_applied' => $request->program_applied,
            'campus'          => $request->campus,
            'program_year'    => $request->program_year,
        ]);

        return back()->with('success', 'Application Submitted Successfully!');
    }
}
