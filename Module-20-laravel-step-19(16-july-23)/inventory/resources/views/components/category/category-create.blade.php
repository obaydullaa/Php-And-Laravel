<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categoryName">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button  type="submit" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>

    $("#insertData").on('submit',async function (e) {
        e.preventDefault();

        let categoryName = document.getElementById('categoryName').value;
        if (categoryName.length === 0) {
            errorToast("Category Required !")
        } else {
            $('#create-modal').modal('hide');
            showLoader();
            let res = await axios.post("/create-category",{name:categoryName})
            hideLoader();
            if(res.status===201){
                successToast('Request completed');
                $("#insertData").trigger("reset");
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }

    })


</script>
