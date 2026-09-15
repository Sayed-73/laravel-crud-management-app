<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="updatemyprojectFrom" method="POST">
                @csrf

                <input type="hidden" id="update_id" name="id">

                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="updateErrMsgContainer"></div>

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" id="update_name">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="update_email">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="number" class="form-control" id="update_phone">
                    </div>

                    <div class="mb-3">
                        <label>Document</label>
                        <input type="file" class="form-control" id="update_document">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_information">Update Information</button>
                </div>

            </form>

        </div>
    </div>
</div>