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
                    <button id="update-modal-close" class="btn  btn-sm btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                    <button onclick="Update()" id="update-btn" type="submit"
                        class="btn btn-sm  btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    async function FilleUpUpdateForm(id) {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/category-by-id", {
            id: id
        })
        console.log(res);
        hideLoader();

        document.getElementById('categryNameUpdate').value = res.data['name'];
    }

    async function Update() {

        let categoryName = document.getElementById('categoryNameUpdate').value;
        let updateID = document.getElementById('updateID').value;

        if (categoryName.length === 0) {
            errorToast("Category Required !")
        } else {
            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post("/update-category", {
                name: categoryName,
                id: updateID 
            })
            hideLoader();

            if (res.status === 200 && res.data === 1) {
                document.getElementById("update-form").reset();
                successToast("Request success !")
                await getList();`
                errorToast("Request fail !")
            }


        }



    }
</script>