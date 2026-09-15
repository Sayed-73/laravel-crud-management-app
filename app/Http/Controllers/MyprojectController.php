<?php

namespace App\Http\Controllers;

use App\Models\Myproject;
use Illuminate\Http\Request;

class MyprojectController extends Controller
{
    //
    // public function index(Request $request)

    // {

    //     return view('myproject');

    // }

    public function myproject(Request $request)
    {

        // // Redirect back with a success message
        // return redirect()->back()->with('success', 'Myproject created successfully!');

        // $myprojects = Myproject::latest()->paginate(10);
        $myprojects = Myproject::paginate(10);
        return view('myproject', compact('myprojects'));
    }

    //add information in myproject table
    public function addinformation(Request $request)
    {
        // Validate the incoming request data
        $request->validate(
            [
                // 'user_id' => 'required|unique:myprojects',
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|unique:myprojects|max:255',
                'phone' => 'nullable|string|max:20',
                'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ],
            [
                // 'user_id.required' => 'The user ID field is required.',
                // 'user_id.unique' => 'The user ID has already been taken.',
                // 'name.string' => 'The name must be a string.',
                // 'name.max' => 'The name may not be greater than 255 characters.',
                'email.unique' => 'The email has already been taken.',
                'email.email' => 'The email must be a valid email address.',
                // 'email.max' => 'The email may not be greater than 255 characters.',
                // 'phone.string' => 'The phone must be a string.',
                // 'phone.max' => 'The phone may not be greater than 20 characters.',
            ]
        );


        $myproject = new Myproject();
        // $myproject->user_id = $request->user_id;
        $myproject->name = $request->name;
        $myproject->email = $request->email;
        $myproject->phone = $request->phone;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            // $file->storeAs('public/documents', $filename);
            $file->move(public_path('storage/documents'), $filename);
            $myproject->document = $filename;
        }
        $myproject->save();
        return response()->json([
            'status' => 'success',

        ]);
    }


    public function updateinformation(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            // 'user_id' => 'required|unique:myprojects',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',


        ]);


        $myproject = Myproject::find($request->id);
        // $myproject->user_id = $request->user_id;
        $myproject->name = $request->name;
        $myproject->email = $request->email;
        $myproject->phone = $request->phone;
        $myproject->save();
        return response()->json([
            'status' => 'success',

        ]);
    }


    public function deleteinformation(Request $request)
    {
        $myproject = Myproject::find($request->id);
        if ($myproject) {
            $myproject->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Myproject deleted successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Myproject not found.',
            ], 404);
        }
    }


    public function searchinformation(Request $request)
    {
        $searchTerm = $request->input('search_string', '');
        $myprojects = Myproject::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('email', 'like', '%' . $searchTerm . '%')
            ->orWhere('phone', 'like', '%' . $searchTerm . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('myproject_table', compact('myprojects'))->render();
    }

    public function updatestatus(Request $request, $id)
    {
        $myproject = Myproject::findOrFail($request->id);
      
            $myproject->status = $myproject->status == 1 ? 0 : 1; // Toggle the status
            $myproject->save();
            return response()->json([
                'status' => 'success',
                'message' => $myproject->status === 1 ? 'Department Activated' : 'Department Deactivated',
                'new_status' => $myproject->status,
            ]);
        
    }
}
