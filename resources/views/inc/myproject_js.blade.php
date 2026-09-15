
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });</script>

    <script>
        $(document).ready(function() {
            // alert('');

            $(document).on('submit','#addmyprojectFrom',function(e){
                e.preventDefault();
                $('.errMsgContainer').html('');
               
                var form = $(this);
                var name = form.find('#name').val();
                var email = form.find('#email').val();
                var phone = form.find('#phone').val();
                var documentFile = form.find('#document')[0].files[0];

                var formData = new FormData();
                formData.append('name', name);
                formData.append('email', email);
                formData.append('phone', phone);
                if (documentFile) {
                    formData.append('document', documentFile);
                }

                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                // console.log(name+email+phone);
                $.ajax({
                    type: "POST",
                    url: "{{route('add.information')}}", 
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    dataType: "json",
                    success: function (response) {
                        if(response.status=='success'){

                                var addModalInstance = bootstrap.Modal.getInstance(document.getElementById('addModal')) || new bootstrap.Modal(document.getElementById('addModal'));
                                addModalInstance.hide();
                                $('#addmyprojectFrom')[0].reset();
                                $('.table').load(location.href + ' .table');    
                        Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Add successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                                                            
                        }else{
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Failed to add information',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            });
                        }

                    },error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors,function(index, value){
                            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                
                });
            });



                        //show update information form

             $(document).on('click','.update_myproject_form',function(e){
                e.preventDefault();
                
                let id = $(this).data('id');
                let name = $(this).data('name');
                let email = $(this).data('email');
                let phone = $(this).data('phone');

                $('#update_id').val(id);
                $('#update_name').val(name);
                $('#update_email').val(email);
                $('#update_phone').val(phone);

                var updateModalInstance = bootstrap.Modal.getInstance(document.getElementById('updateModal')) || new bootstrap.Modal(document.getElementById('updateModal'));
                updateModalInstance.show();
                $(this).blur();
             });

             //update information
             $(document).on('click','.update_information',function(e){
                e.preventDefault();
                let id = $('#update_id').val();
                let name = $('#update_name').val();
                let email = $('#update_email').val();
                let phone = $('#update_phone').val();       

                $.ajax({
                    type: "POST",
                    url: "{{route('update.information')}}", 
                    data: {
                        id:id,
                        name:name,
                        email:email,
                        phone:phone,
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.status=='success'){
                                var updateModalInstance = bootstrap.Modal.getInstance(document.getElementById('updateModal')) || new bootstrap.Modal(document.getElementById('updateModal'));
                                updateModalInstance.hide();
                                $('#updatemyprojectFrom')[0].reset();
                                $('.table').load(location.href + ' .table');    
                        Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: 'Update successfully',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                    });
                        }else{
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Failed to update information',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            });
                        }
                    },error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors,function(index, value){
                            $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
             });

                //delete information
                  $(document).on('click','.delete_information',function(e){
                e.preventDefault();
                let myproject_id = $(this).data('id');
                $(this).blur();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: '/delete-information/' + myproject_id ,  
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 'success') {
                                    $('.table').load(location.href + ' .table');
                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Deleted successfully',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true
                                    });
                                } else {
                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'error',
                                        title: 'Failed to delete information',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    });
                                }
                            }
                        });
                    }
                });
            });

               //search information
                $(document).on('keyup', '#search', function(e) {
                e.preventDefault();
                let search_string = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('search.information') }}",
                    data: { search_string: search_string },
                    success: function(response) {
                        $('.table-data').html(response);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });

        });

$(document).on('change', '.status-toggle', function() {
    var id = $(this).data('id');
    var status = $(this).prop('checked') ? 1 : 0;
    $.ajax({
        url: '/update-status/' + id,
        type: 'POST',
        dataType: 'json',
        data: {
            status: status,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status == 'success') {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Failed to update status',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
            }
        },
        error: function(err) {
            console.log(err);
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: 'Error updating status',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            });
        }
    });
    });






    </script>
