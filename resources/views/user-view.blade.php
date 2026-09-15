  
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.3.2 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        
    </head>
    

    <body>

<div class="container-fluid mt-3">
    
    <div class="table-responsive">

        <form action="{{ url('/user/view') }}" method="GET">
            <div class="row m-2">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="search"
                        placeholder="Search by Name ,Email or Department"
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped w-100">
            <thead class="table-dark">
                <tr>
                    <th>full_name</th>
                    <th>email</th>
                    <th>official_email</th>
                    <th>mobile_no</th>
                    <th>department</th>
                    <th>company_name</th>
                    <th>extension_number</th>
                    <th>password</th>
                    <th>voip_user_name</th>
                    <th>responsible_person</th>
                    <th>Photo</th>
                    <th>Document</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr id="user-row-{{ $user->id }}">
                    <td class="user-full_name">{{ $user->full_name }}</td>
                    <td class="user-email">{{ $user->email }}</td>
                    <td class="user-official_email">{{ $user->official_email }}</td>
                    <td class="user-mobile_no">{{ $user->mobile_no }}</td>
                    <td class="user-department">{{ $user->department }}</td>
                    <td class="user-company_name">{{ $user->company_name }}</td>
                    <td class="user-extension_number">{{ $user->extension_number }}</td>
                    <td class="user-password">{{ $user->password }}</td>
                    <td class="user-voip_user_name">{{ $user->voip_user_name }}</td>
                    <td class="user-responsible_person">{{ $user->responsible_person }}</td>
                    <td>
                        @if($user->photo)
                            <a href="{{ asset('storage/' . $user->photo) }}" target="_blank">View Photo</a>
                        @else
                            No Photo
                        @endif</td>

                    <td>
                        @if($user->document)
                            <a href="{{ asset('storage/' . $user->document) }}" target="_blank">View Document</a>
                        @else
                            No Document
                        @endif
                    </td>
                     {{-- <td>{{$user->status}}</td>
                      <td>{{$user->actions}}</td> --}}

                   <td>

@if($user->status==1)

<a href="{{url('user/status/'.$user->id)}}"
    user-full="{{$user->id}}"
    
    
    >
<button class="btn btn-success btn-sm">
Active
</button>
</a>

@else

<a href="{{url('user/status/'.$user->id)}}">
<button class="btn btn-danger btn-sm">
Inactive
</button>
</a>

@endif

</td>

<td>
    <button type="button"
        class="btn btn-success editBtn"
        data-bs-toggle="modal"
        data-bs-target="#editUserModal"
        data-id="{{ $user->id }}"
        data-full_name="{{ $user->full_name }}"
        data-email="{{ $user->email }}"
        data-official_email="{{ $user->official_email }}"
        data-mobile_no="{{ $user->mobile_no }}"
        data-department="{{ $user->department }}"
        data-company_name="{{ $user->company_name }}"
        data-extension_number="{{ $user->extension_number }}"
        data-password="{{ $user->password }}"
        data-voip_user_name="{{ $user->voip_user_name }}"
        data-responsible_person="{{ $user->responsible_person }}">
        Edit
    </button>

    <a href="{{ url('user/delete/'.$user->id) }}"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Are you sure?')">
        Delete
    </a>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $users->links() }}
        </div>

    </div>

</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateForm">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="update_department" name="update_department" value="">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="update_full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="update_full_name" name="update_full_name" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="update_email" name="update_email" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_official_email" class="form-label">Official Email</label>
                            <input type="email" class="form-control" id="update_official_email" name="update_official_email" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_mobile_no" class="form-label">Mobile No</label>
                            <input type="text" class="form-control" id="update_mobile_no" name="update_mobile_no" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_department_select" class="form-label">Department</label>
                            <select class="form-select" id="update_department_select" name="update_department_select">
                                <option value="">- Select Department -</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="MECH">MECH</option>
                                <option value="BBA">BBA</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="update_department_custom" class="form-label">Other Department (optional)</label>
                            <input type="text" class="form-control" id="update_department_custom" name="update_department_custom" placeholder="If not listed, type here">
                        </div>
                        <div class="col-md-6">
                            <label for="update_company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="update_company_name" name="update_company_name" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_extension_number" class="form-label">Extension Number</label>
                            <input type="text" class="form-control" id="update_extension_number" name="update_extension_number" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_voip_user_name" class="form-label">VOIP User Name</label>
                            <input type="text" class="form-control" id="update_voip_user_name" name="update_voip_user_name" >
                        </div>
                        <div class="col-md-6">
                            <label for="update_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="update_password" name="update_password">
                        </div>
                        <div class="col-md-6">
                            <label for="update_responsible_person" class="form-label">Responsible Person</label>
                            <input type="text" class="form-control" id="update_responsible_person" name="update_responsible_person">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
let userId = null;
const updateForm = document.getElementById('updateForm');
const editModalEl = document.getElementById('editUserModal');
let editModal = null;

if (window.bootstrap && editModalEl) {
    editModal = new bootstrap.Modal(editModalEl);
}

// modal e data fill
const editButtons = document.querySelectorAll('.editBtn');
if (editButtons.length > 0) {
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            userId = this.getAttribute('data-id');

            document.getElementById('update_full_name').value = this.getAttribute('data-full_name');
            document.getElementById('update_email').value = this.getAttribute('data-email');
            document.getElementById('update_official_email').value = this.getAttribute('data-official_email');
            document.getElementById('update_mobile_no').value = this.getAttribute('data-mobile_no');
            const department = this.getAttribute('data-department');
            const departmentSelect = document.getElementById('update_department_select');
            const departmentCustom = document.getElementById('update_department_custom');
            const departmentHidden = document.getElementById('update_department');
            if (['CSE', 'EEE', 'CIVIL', 'MECH', 'BBA'].includes(department)) {
                departmentSelect.value = department;
                departmentCustom.value = '';
                departmentHidden.value = department;
            } else {
                departmentSelect.value = '';
                departmentCustom.value = department;
                departmentHidden.value = department;
            }
            document.getElementById('update_company_name').value = this.getAttribute('data-company_name');
            document.getElementById('update_extension_number').value = this.getAttribute('data-extension_number');
            document.getElementById('update_voip_user_name').value = this.getAttribute('data-voip_user_name');
            document.getElementById('update_password').value = this.getAttribute('data-password');
            document.getElementById('update_responsible_person').value = this.getAttribute('data-responsible_person');

            if (editModal) {
                editModal.show();
            }
        });
    });
}

function updateTableRow(id) {
    const row = document.getElementById(`user-row-${id}`);
    if (!row) return;

    row.querySelector('.user-full_name').textContent = document.getElementById('update_full_name').value;
    row.querySelector('.user-email').textContent = document.getElementById('update_email').value;
    row.querySelector('.user-official_email').textContent = document.getElementById('update_official_email').value;
    row.querySelector('.user-mobile_no').textContent = document.getElementById('update_mobile_no').value;
    const departmentValue = document.getElementById('update_department_custom').value.trim() || document.getElementById('update_department_select').value;
    row.querySelector('.user-department').textContent = departmentValue;
    row.querySelector('.user-company_name').textContent = document.getElementById('update_company_name').value;
    row.querySelector('.user-extension_number').textContent = document.getElementById('update_extension_number').value;
    row.querySelector('.user-voip_user_name').textContent = document.getElementById('update_voip_user_name').value;
    row.querySelector('.user-password').textContent = document.getElementById('update_password').value;
    row.querySelector('.user-responsible_person').textContent = document.getElementById('update_responsible_person').value;
}

if (updateForm) {
    updateForm.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!userId) {
            Swal.fire({
                icon: 'error',
                title: 'Update failed',
                text: 'User id missing.',
            });
            return;
        }

        const tokenInput = document.querySelector('input[name="_token"]');
        const departmentCustomValue = document.getElementById('update_department_custom').value.trim();
        const departmentSelectValue = document.getElementById('update_department_select').value;
        document.getElementById('update_department').value = departmentCustomValue || departmentSelectValue;
        const formData = new FormData(this);

        fetch(`/user-update/${userId}`, {   
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': tokenInput ? tokenInput.value : '',
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    if (editModal) {
                        editModal.hide();
                    }
                    updateTableRow(userId);
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Update failed',
                        text: data.message || 'Something went wrong.',
                    });
                }
            })
            .catch(err => {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Update failed',
                    text: 'Check console for details.',
                });
            });
    });
}
</script>
</body>
</html>

