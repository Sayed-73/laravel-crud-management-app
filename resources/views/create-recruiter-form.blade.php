<div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UKMC | Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- Hero Section --> 
    <div class="text-center mb-5">
        <h1 class="fw-bold">Remote Recruiter Registration Form</h1>
        <p class="lead mt-3 fw-bold">
           Process of Becoming a Remote Recruiter
        </p>
    </div>

    <!-- Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow">
                <div class="card-body p-4">
                    <form method="post" action="{{ route('recruiter.store') }}" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-borderless table-sm">
                        <tbody>
                        <h4 class="mb-4 text-center">Personal Details</h4>
                        <tr>
                            <td>Full Name</td>
                            <td>
                                <input type="text" class="form-control" name="full_name">
                            </td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" class="form-control" name="email">
                            </td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" class="form-control" name="phone">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2"> <h4 class="my-3 text-center">UK Address</h4></th>
                        </tr>
                       
                        <tr>
                            <td>Address Line 1</td>
                            <td>
                                <input type="text" class="form-control" name="address_line1">
                            </td>
                        </tr>

                        <tr>
                            <td>Address Line 2</td>
                            <td>
                                <input type="text" class="form-control" name="address_line2">
                            </td>
                        </tr>

                        <tr>
                            <td>Post Code</td>
                            <td>
                                <input type="text" class="form-control" name="post_code">
                            </td>
                        </tr>

                        <tr>
                            <td>City</td>
                            <td>
                                <input type="text" class="form-control" name="city">
                            </td>
                        </tr>

                        <tr>
                            <th colspan="2"> <h4 class="my-3 text-center">Bank Details</h4></th>
                        </tr>
                       
                        <tr>
                            <td>Account Name</td>
                            <td>
                                <input type="text" class="form-control" name="account_name">
                            </td>
                        </tr>

                        <tr>
                            <td>Account Number</td>
                            <td>
                                <input type="text" class="form-control" name="account_number">
                            </td>
                        </tr>

                        <tr>
                            <td>Sort Code</td>
                            <td>
                                <input type="text" class="form-control" name="sort_code">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped table-sm mb-5">
                        <thead>
                        <tr>
                            <th colspan="3"> <h4 class="my-3 text-center">Document Upload</h4></th>
                        </tr>
                        <tr>
                            <th>File Name</th>
                            <th>Upload Date</th>
                            <th class="float-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Director's ID</td>
                            <td>26/03/26</td>
                            <td>
                                <div class="float-end">
                                    <a href="#" class="btn btn-success btn-sm">Preview</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>CH Registration Certificate</td>
                            <td>26/03/26</td>
                            <td>
                                <div class="float-end">
                                    <a href="#" class="btn btn-success btn-sm">Preview</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Accountant Letter</td>
                            <td>26/03/26</td>
                            <td>
                                <div class="float-end">
                                    <a href="#" class="btn btn-success btn-sm">Preview</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Reference Letter</td>
                            <td>26/03/26</td>
                            <td>
                                <div class="float-end">
                                    <a href="#" class="btn btn-success btn-sm">Preview</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>ICO Certificate</td>
                            <td>26/03/26</td>
                            <td>
                                <div class="float-end">
                                    <a href="#" class="btn btn-success btn-sm">Preview</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="3"> <h4 class="my-3 text-center">Add new document</h4></th>
                        </tr>

                        <tr>
                            <td>
                                <div class="mb-3">
                                <label class="form-label">Browse Document </label>
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                            </td>
                            <td>
                                <div class="mb-3">
                                    <label class="form-label">Select Document Type </label>
                                    <select class="form-select" name="document_type" required>
                                        <option value="#" disabled selected></option>
                                        <option value="Director's ID">Director's ID</option>
                                        <option value="CH Registration Certificate">CH Registration Certificate</option>
                                        <option value="Accountant Letter">Accountant Letter</option>
                                        <option value="Reference Letter">Reference Letter</option>
                                        <option value="ICO Certificate">ICO Certificate</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary mt-4 w-100">Upload</button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th colspan="3"> <h4 class="my-3 text-center"></h4></th>
                        </tr>

                        {{-- <tr>
                            <td>
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="user_email">
                            </td>
                            <td>
                                <label class="form-label">Password </label>
                                <input type="password" class="form-control" name="user_password">
                            </td>
                            <td>
                                 <div class="mt-2">
                                    <button type="submit" class="btn btn-primary mt-4 w-100">Create User</button>
                                </div>
                            </td>
                        </tr> --}}

                        </tbody>
                    </table>

                    <h4 class="my-3 text-center">Declaration and Consent</h4>

                    <p><i>I hereby declare that all the information and documents provided in this application are true, accurate, and complete to the best of my knowledge. I understand that providing false or misleading information may result in the rejection of my application or termination of any agreement. </i></p>
                    <p><i>I confirm that I have read and understood the policies and requirements for becoming a remote recruiter and agree to comply with all applicable regulations, including GDPR and data protection standards. </i></p>
                    <p><i>By submitting this form, I consent to the processing and storage of my personal data by UK Management College for the purpose of evaluating and managing this application. I also agree that my details may be used for communication related to this partnership.</i></p>

                    <h6 class="text-center mt-4"> I agree to the above declaration and consent</h6>
                    <p class="fw-bold py-2 text-center">
                        <label class="checkbox-inline me-4">
                            <input type="checkbox" value=""> Yes
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" value=""> No
                        </label> 
                    </p>

                    <p class="text-center">
                        <button type="submit" class="btn btn-primary mt-2 btn-lg">Submit</button>
                    </p>

                        

                        <!-- Submit -->
                        <!-- <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg"> <button type="submit" class="btn btn-primary btn-lg"></button>
                                <a href="received your enquiry msg.html" class="text-white" style="text-decoration: none;">Apply Now</a> 
                            </button>
                        </div> -->

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

</div>
