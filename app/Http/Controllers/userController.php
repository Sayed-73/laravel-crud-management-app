<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // সঠিক ইমপোর্ট
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\user_create;
use App\Models\BankDetail;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(): View
    {
        return view('user');
    }


    // public function store(Request $request)
    // {
    //     $action = $request->input('action');

    //     // ================= FILE UPLOAD =================
    //     if ($action === 'upload') {

    //         $request->validate([
    //             'document' => 'required|file|mimes:pdf,doc,docx,txt|max:5120',
    //         ]);

    //         if ($request->hasFile('document')) {
    //             $path = $request->file('document')->store('user_documents', 'public');

    //             return back()
    //                 ->with('success', 'File uploaded successfully!')
    //                 ->with('document_path', $path);
    //         }

    //         return back()->with('error', 'No file uploaded');
    //     }

    //     // ================= USER CREATE =================
    //     $request->validate([
    //         'extension_number'   => 'required|unique:user,extension_number',
    //         'full_name'          => 'required|string|max:255',
    //         'email'              => 'required|email|unique:user,email',
    //         'official_email'     => 'required|email|unique:user,official_email',
    //         'mobile_no'          => 'required',
    //         'password'           => 'required|string|min:8',
    //         'company_name'       => 'required|string|max:255',
    //         'voip_user_name'     => 'required|string|max:255',
    //         'department'         => 'required',
    //     ]);

    //     $user = User::create([
    //         'extension_number' => $request->extension_number,
    //         'full_name'        => $request->full_name,
    //         'company_name'     => $request->company_name,
    //         'voip_user_name'   => $request->voip_user_name,
    //         'responsible_person' => $request->responsible_person,
    //         'email'            => $request->email,
    //         'official_email'   => $request->official_email,
    //         'mobile_no'        => $request->country_code . $request->mobile_no,
    //         'password'         => bcrypt($request->password),
    //         'department'       => $request->department,
    //         'status'           => 'Inactive',
    //         'document'         => 'null',
    //     ]);

    //     return back()->with('success', 'User Created Successfully!');
    // }



    public function store(Request $request)
    {
        // $action = $request->input('action');
        // ১. ভ্যালিডেশন (ব্লেড ফাইলের name="" এর সাথে হুবহু মিল থাকতে হবে)
        $request->validate([
            'extension_number'   => 'required|unique:user,extension_number',
            'full_name'          => 'required|string|max:255',
            'email'              => 'required|email|unique:user,email',
            'official_email'     => 'required|email|unique:user,official_email',
            'mobile_no'          => 'required',
            'password'           => 'required|string|min:8', // 'password' এর বদলে 'min:8'
            'company_name'       => 'required|string|max:255',
            'voip_user_name'     => 'required|string|max:255',
            'responsible_person' => 'nullable',
            'department'         => 'required',
            // 'photo'              => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document'           => 'nullable|file|mimes:pdf,doc,docx,txt|max:5120',
        ]);

        // $photoPath = '';
        // if ($request->hasFile('photo')) {
        //     $photoPath = $request->file('photo')->store('user_photos', 'public');
        // }

        $documentPath = 'null';
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('user_documents', 'public');
        }
        //  if ($action === 'upload') {
        //     $request->validate([
        //         'document' => 'required|file|mimes:pdf,doc,docx,txt|max:5120',
        //     ]);
        //     if ($request->hasFile('document')) {
        //         $documentPath = $request->file('document')->store('user_documents', 'public');
        //         return back()->with('success', 'File uploaded successfully!')->with('document_path', $documentPath);
        //     } else {
        //         return back()->with('error', 'No file uploaded.');
        //     }

        //  }


        // ২. ডেটাবেসে সেভ করা
        $user = User::create([
            'extension_number'   => $request->extension_number,
            'full_name'          => $request->full_name,
            'company_name'       => $request->company_name,
            'voip_user_name'     => $request->voip_user_name,
            'responsible_person' => $request->responsible_person,
            'email'              => $request->email,
            'official_email'     => $request->official_email,
            'mobile_no'          => $request->country_code . $request->mobile_no,
            'password'           => bcrypt($request->password),
            'department'         => $request->department,
            'status'             => 'Inactive',
            // 'photo'              => $photoPath,
            'document'           => $documentPath,
        ]);



        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['id' => $user->id], 201);
        }

        return back()->with('success', 'Submit Successful!');
    }


    public function view(Request $request)
    {

        $search = $request->input('search');

        if ($search) {
            $users = user::where('full_name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('department', 'LIKE', "%$search%")
                ->paginate(10);
        } else {
            $users = User::simplePaginate(5);
            // // Controller-e eivabe thaka dorkar:
            //        $users = YourModel::paginate(2);
        }

        // compact এর ভেতরে 'search' ভেরিয়েবলটিও পাঠান যাতে ইনপুট বক্সে লেখাটি থেকে যায়
        return view('user-view', compact('users', 'search'));
    }

    public function status($id)
    {
        $user = User::find($id);

        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        $user->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('message', 'User Deleted Successfully');
    }


    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'document' => 'required|file|mimes:pdf,doc,docx,txt|max:5120',
    //     ]);

    //     // $filePath = $request->file('file')->store('uploads', 'public');

    //     // $documentPath='null';

    //     if ($request->hasFile('document')) {
    //         // $documentPath=$request->file('document')->store('user_documents', 'public');
    //         return "no file uploaded";
    //     }
    //     $path = $request->file('document')->store('user_documents', 'public');

    //      return back()->with('success', 'File uploaded successfully!')->with('document_path', $path);

    //     }
    // return back()->with('success', 'File uploaded successfully!')->with('document_path', $documentPath);
    public function storeuser(Request $request)
    {
        $request->validate([
            // 'creator_user_id' => 'required|integer|exists:user,id',
            'create_email' => 'required|email|unique:user_creates,email',
            'create_password' => 'required|string|min:8',
        ]);

        $createUser = user_create::create([
            // 'creator_user_id' => $request->input('creator_user_id'),
            'email' => $request->input('create_email'),
            'password' => bcrypt($request->input('create_password')),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'id' => $createUser->id], 201);
        }

        return back()->with('success', 'Created user successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user-update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'update_extension_number'   => 'required|unique:user,extension_number,' . $id,
            'update_full_name'          => 'required|string|max:255',
            'update_email'              => 'required|email|unique:user,email,' . $id,
            'update_official_email'     => 'required|email|unique:user,official_email,' . $id,
            'update_mobile_no'          => 'required',
            'update_company_name'       => 'required|string|max:255',
            'update_voip_user_name'     => 'required|string|max:255',
            'update_responsible_person' => 'nullable|string|max:255',
            'update_department'         => 'required|string',
        ]);

        $user->update([
            'extension_number'   => $request->input('update_extension_number'),
            'full_name'          => $request->input('update_full_name'),
            'company_name'       => $request->input('update_company_name'),
            'voip_user_name'     => $request->input('update_voip_user_name'),
            'responsible_person' => $request->input('update_responsible_person'),
            'email'              => $request->input('update_email'),
            'official_email'     => $request->input('update_official_email'),
            'mobile_no'          => $request->input('update_country_code') . $request->input('update_mobile_no'),
            'department'         => $request->input('update_department'),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect('/user/view')->with('success', 'User updated successfully!');
    }








    // 🔹 Save main form
    public function recruiterstore(Request $request)
    {
        $user = User::find(Auth::id());

        $user->update([
            'name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'post_code' => $request->post_code,
            'city' => $request->city,
        ]);

        BankDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'sort_code' => $request->sort_code,
            ]
        );

        return back()->with('success', 'Saved Successfully');
    }

    // 🔹 Upload document (AJAX)
    public function uploadDocument(Request $request)
    {
        $file = $request->file('file');

        $name = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('documents', $name, 'public');

        $doc = Document::create([
            'user_id' => Auth::id(),
            'file_name' => $name,
            'file_path' => $path,
            'type' => $request->type,
        ]);

        return response()->json([
            'id' => $doc->id,
            'file_name' => $doc->type,
            'date' => $doc->created_at->format('d/m/Y')
        ]);
    }

    // 🔹 Preview
    public function preview($id)
    {
        $doc = Document::findOrFail($id);

        return response()->file(public_path('storage/' . $doc->file_path));
    }

    // 🔹 Delete
    public function documentdelete($id)
    {
        $doc = Document::find($id);

        if ($doc) {
            unlink(public_path('storage/' . $doc->file_path));
            $doc->delete();
        }

        return response()->json(['status' => true]);
    }



    public function learning()
    {
        return view('learn');
    }
}
