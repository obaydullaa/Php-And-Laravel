
<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categryNameUpdate">
                                <input id="updateID">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-modal-close"  class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Update()" id="update-btn" type="submit" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    async funcion Update() {

        let categryNameUpdate = document.getElementById('categryNameUpdate').value;

    }

</script>