{{-- 

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  
  <div class="modal-dialog">
    <div class="modal-content">
  <form action="" method="POST" id="addmyprojectFrom" enctype="multipart/form-data">
            @csrf
  
    
      <div class="modal-header">
        <h5 class="modal-title " id="addModalLabel">Add information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="errMsgContainer">

        </div>

        {{-- <div class="mb-3">
              <label for="user_id" class="form-label">User Id</label>
              <input type="text"  class="form-control" id="user_id" name="user_id" placeholder="Enter user ID" aria-describedby="emailHelp">
            </div> --}}
       
            {{-- <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="number" class="form-control" id="phone" placeholder="Enter phone">
            </div>
              <div class="mb-3">
                <label for="document" class="form-label">Document</label>
                <input type="file" class="form-control" id="document" name="document" accept=".pdf,.doc,.docx">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_information">Save information</button>
      </div>
      </div>
     </form>
    </div>
  </div>
  
</div>  --}}



<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="addmyprojectFrom" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" id="id" name="id">

                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="errMsgContainer"></div>

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="phone">
                    </div>

                    <div class="mb-3">
                        <label>Document</label>
                        <input type="file" class="form-control" id="document" name="document" accept=".pdf,.doc,.docx">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_information">Add Information</button>
                </div>

            </form>

        </div>
    </div>
</div>
